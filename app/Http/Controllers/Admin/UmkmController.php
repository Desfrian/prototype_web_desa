<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::orderBy('order')->paginate(10);
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'owner'       => 'nullable|string|max:100',
            'contact'     => 'nullable|string|max:20',
            'order'       => 'integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('umkm', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')
                         ->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
            'owner'       => 'nullable|string|max:100',
            'contact'     => 'nullable|string|max:20',
            'order'       => 'integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($umkm->image) Storage::disk('public')->delete($umkm->image);
            $validated['image'] = $request->file('image')->store('umkm', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')
                         ->with('success', 'UMKM berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->image) Storage::disk('public')->delete($umkm->image);
        $umkm->delete();

        return redirect()->route('admin.umkm.index')
                         ->with('success', 'UMKM berhasil dihapus!');
    }
}