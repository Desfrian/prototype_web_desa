@extends('layouts.admin')
@section('title', 'Manajemen Admin')
@section('page-title', 'Manajemen Akun Admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total {{ $users->total() }} akun</p>
    <a href="{{ route('admin.users.create') }}"
       class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors flex items-center gap-2">
        <span class="material-symbols-outlined text-base">person_add</span>
        Tambah Admin
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Nama</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Email</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Role</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Bergabung</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                            <span class="text-green-700 font-semibold text-sm">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </span>
                        </div>
                        <span class="font-medium text-gray-800">{{ $user->name }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    @foreach($user->roles as $role)
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                        {{ $role->name }}
                    </span>
                    @endforeach
                </td>
                <td class="px-6 py-4 text-gray-500 text-xs">
                    {{ $user->created_at->format('d/m/Y') }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="text-blue-600 hover:text-blue-800">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </a>
                        @if($user->id !== auth()->id())
                        <form method="POST"
                              action="{{ route('admin.users.destroy', $user) }}"
                              onsubmit="return confirm('Hapus akun {{ $user->name }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <span class="material-symbols-outlined text-base">delete</span>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
