@extends('layouts.admin')
@section('title', 'Role & Akses')
@section('page-title', 'Manajemen Role & Akses')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Daftar Role --}}
    <div class="lg:col-span-2 space-y-4">
        @foreach($roles as $role)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-green-700">shield_person</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $role->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $role->users_count }} pengguna</p>
                    </div>
                </div>
                @if(!in_array($role->name, ['super-admin']))
                <form method="POST" action="{{ route('admin.roles.destroy', $role) }}"
                      onsubmit="return confirm('Hapus role {{ $role->name }}?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <span class="material-symbols-outlined text-base">delete</span>
                    </button>
                </form>
                @endif
            </div>

            {{-- Permission Checkboxes --}}
            <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                @csrf @method('PUT')
                <div class="border-t border-gray-100 pt-4">
                    <p class="text-xs text-gray-500 mb-3 uppercase tracking-wider font-medium">Permission</p>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($permissions as $permission)
                        <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" name="permissions[]"
                                   value="{{ $permission->name }}"
                                   {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                   class="rounded text-green-700 focus:ring-green-600"/>
                            {{ $permission->name }}
                        </label>
                        @endforeach
                    </div>
                    @if($permissions->isEmpty())
                    <p class="text-sm text-gray-400">Belum ada permission. Tambahkan melalui seeder atau tinker.</p>
                    @endif
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit"
                            class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                        Simpan Permission
                    </button>
                </div>
            </form>
        </div>
        @endforeach
    </div>

    {{-- Tambah Role Baru --}}
    <div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-semibold text-gray-800 mb-4 pb-3 border-b border-gray-100">Tambah Role Baru</h3>
            <form method="POST" action="{{ route('admin.roles.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Role *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           placeholder="contoh: editor"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none @error('name') border-red-400 @enderror"/>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit"
                        class="w-full bg-[#012d1d] text-white px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                    Tambah Role
                </button>
            </form>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mt-4">
            <p class="text-sm text-blue-800 font-medium mb-1">💡 Info</p>
            <p class="text-xs text-blue-700">
                Role <strong>super-admin</strong> memiliki akses penuh dan tidak bisa dihapus.
                Gunakan permission untuk mengatur hak akses setiap role.
            </p>
        </div>
    </div>

</div>

@endsection
