<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache role & permission dulu
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ============================================
        // LANGKAH 1: Buat 3 Role
        // ============================================
        $superAdminRole  = Role::create(['name' => 'super-admin']);
        $adminKontenRole = Role::create(['name' => 'admin-konten']);
        $adminLayananRole = Role::create(['name' => 'admin-layanan']);

        // ============================================
        // LANGKAH 2: Buat akun Super Admin
        // ============================================
        $superAdmin = User::create([
            'name'              => 'Super Admin',
            'email'             => 'superadmin@desa-amanah.id',
            'password'          => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole($superAdminRole);

        // ============================================
        // LANGKAH 3: Buat akun Admin Konten
        // ============================================
        $adminKonten = User::create([
            'name'              => 'Admin Konten',
            'email'             => 'konten@desa-amanah.id',
            'password'          => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $adminKonten->assignRole($adminKontenRole);

        // ============================================
        // LANGKAH 4: Buat akun Admin Layanan
        // ============================================
        $adminLayanan = User::create([
            'name'              => 'Admin Layanan',
            'email'             => 'layanan@desa-amanah.id',
            'password'          => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $adminLayanan->assignRole($adminLayananRole);
    }
}
