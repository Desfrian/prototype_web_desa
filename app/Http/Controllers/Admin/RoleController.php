<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users')->get();
        $permissions = Permission::all();

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:roles,name',
        ]);

        Role::create(['name' => $validated['name']]);

        return redirect()->route('admin.roles.index')
                         ->with('success', 'Role berhasil ditambahkan!');
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role->syncPermissions($validated['permissions'] ?? []);

        return redirect()->route('admin.roles.index')
                         ->with('success', "Permission untuk role \"{$role->name}\" berhasil diperbarui!");
    }

    public function destroy(Role $role)
    {
        if ($role->users()->count() > 0) {
            return redirect()->route('admin.roles.index')
                             ->with('error', 'Role masih digunakan oleh user, tidak bisa dihapus!');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
                         ->with('success', 'Role berhasil dihapus!');
    }
}
