@extends('layouts.admin')
@section('title', 'Kelola Wisata')
@section('page-title', 'Kelola Destinasi Wisata')

@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total {{ $places->total() }} destinasi</p>
    <a href="{{ route('admin.tourism.create') }}"
       class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors flex items-center gap-2">
        <span class="material-symbols-outlined text-base">add</span>
        Tambah Wisata
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($places as $place)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="h-40 bg-gray-100 overflow-hidden">
            @if($place->image)
                <img src="{{ Storage::url($place->image) }}"
                     class="w-full h-full object-cover"/>
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-gray-300">travel_explore</span>
                </div>
            @endif
        </div>
        <div class="p-4">
            <div class="flex items-start justify-between gap-2 mb-2">
                <h4 class="font-semibold text-gray-800">{{ $place->name }}</h4>
                @if($place->is_featured)
                <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full shrink-0">Featured</span>
                @endif
            </div>
            <p class="text-xs text-gray-500 mb-1">{{ $place->category }}</p>
            <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ $place->description }}</p>
            <div class="flex gap-2">
                <a href="{{ route('admin.tourism.edit', $place) }}"
                   class="flex-1 text-center bg-blue-50 text-blue-700 py-1.5 rounded-lg text-sm hover:bg-blue-100 transition-colors">
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.tourism.destroy', $place) }}"
                      onsubmit="return confirm('Hapus destinasi ini?')" class="flex-1">
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
    <div class="col-span-3 text-center py-12 text-gray-400">
        Belum ada destinasi wisata.
    </div>
    @endforelse
</div>

@endsection