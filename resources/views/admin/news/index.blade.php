@extends('layouts.admin')
@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total {{ $news->total() }} berita</p>
    <a href="{{ route('admin.news.create') }}"
       class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors flex items-center gap-2">
        <span class="material-symbols-outlined text-base">add</span>
        Tambah Berita
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Judul</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Kategori</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Status</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Tanggal</th>
                <th class="text-left px-6 py-3 text-gray-500 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($news as $item)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        @if($item->image)
                            <img src="{{ Storage::url($item->image) }}"
                                 class="w-10 h-10 rounded-lg object-cover shrink-0"/>
                        @else
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-sm text-gray-400">article</span>
                            </div>
                        @endif
                        <span class="font-medium text-gray-800 line-clamp-1">{{ $item->title }}</span>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-500">{{ $item->category }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-medium
                        {{ $item->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $item->status }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500">
                    {{ $item->created_at->format('d/m/Y') }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.news.edit', $item) }}"
                           class="text-blue-600 hover:text-blue-800 transition-colors">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </a>
                        <form method="POST"
                              action="{{ route('admin.news.destroy', $item) }}"
                              onsubmit="return confirm('Hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                <span class="material-symbols-outlined text-base">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                    Belum ada berita. <a href="{{ route('admin.news.create') }}" class="text-green-700 underline">Tambah sekarang</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($news->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $news->links() }}
    </div>
    @endif
</div>

@endsection