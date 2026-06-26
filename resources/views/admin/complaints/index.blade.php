@extends('layouts.admin')
@section('title', 'Pengaduan')
@section('page-title', 'Kelola Pengaduan Warga')

@section('content')

{{-- Filter Status --}}
<div class="flex gap-2 mb-6">
    @foreach(['' => 'Semua', 'baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai'] as $val => $label)
    <a href="{{ route('admin.complaints.index', $val ? ['status' => $val] : []) }}"
       class="px-4 py-2 rounded-lg text-sm font-medium transition-colors
              {{ request('status') === $val || (request('status') === null && $val === '')
                 ? 'bg-[#012d1d] text-white'
                 : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
        {{ $label }}
    </a>
    @endforeach
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Pengirim</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Kategori</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Isi</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Status</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Tanggal</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($complaints as $complaint)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <p class="font-medium text-gray-800">{{ $complaint->sender_name }}</p>
                    <p class="text-xs text-gray-500">{{ $complaint->sender_phone }}</p>
                </td>
                <td class="px-6 py-4 text-gray-500">
                    {{ $complaint->category->name ?? '-' }}
                </td>
                <td class="px-6 py-4 text-gray-600 max-w-xs">
                    <p class="line-clamp-2">{{ $complaint->content }}</p>
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-medium
                        {{ $complaint->status === 'baru' ? 'bg-red-100 text-red-600' :
                           ($complaint->status === 'diproses' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                        {{ $complaint->status }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500 text-xs">
                    {{ $complaint->created_at->format('d/m/Y H:i') }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.complaints.show', $complaint) }}"
                           class="text-blue-600 hover:text-blue-800">
                            <span class="material-symbols-outlined text-base">visibility</span>
                        </a>
                        <form method="POST"
                              action="{{ route('admin.complaints.destroy', $complaint) }}"
                              onsubmit="return confirm('Hapus pengaduan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <span class="material-symbols-outlined text-base">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                    Tidak ada pengaduan ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($complaints->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $complaints->links() }}
    </div>
    @endif
</div>

@endsection
