@extends('layouts.admin')
@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri Foto')

@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total {{ $galleries->total() }} foto</p>
    <a href="{{ route('admin.gallery.create') }}"
       class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors flex items-center gap-2">
        <span class="material-symbols-outlined text-base">add_photo_alternate</span>
        Tambah Foto
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @forelse($galleries as $gallery)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="h-40 bg-gray-100 overflow-hidden">
            @if($gallery->image)
                <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : Storage::url($gallery->image) }}"
                     class="w-full h-full object-cover"/>
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-gray-300">photo</span>
                </div>
            @endif
        </div>
        <div class="p-4">
            <h4 class="font-semibold text-gray-800 text-sm truncate mb-1">{{ $gallery->title }}</h4>
            @if($gallery->caption)
            <p class="text-xs text-gray-500 line-clamp-2 mb-3">{{ $gallery->caption }}</p>
            @endif
            <div class="flex gap-2">
                <a href="{{ route('admin.gallery.edit', $gallery) }}"
                   class="flex-1 text-center bg-blue-50 text-blue-700 py-1.5 rounded-lg text-sm hover:bg-blue-100 transition-colors">
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.gallery.destroy', $gallery) }}"
                      onsubmit="return confirm('Hapus foto ini?')" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="w-full bg-red-50 text-red-600 py-1.5 rounded-lg text-sm hover:bg-red-100 transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center py-12 text-gray-400">
        Belum ada foto galeri. <a href="{{ route('admin.gallery.create') }}" class="text-green-700 underline">Tambah sekarang</a>
    </div>
    @endforelse
</div>

@if($galleries->hasPages())
<div class="mt-6">
    {{ $galleries->links() }}
</div>
@endif

@endsection
