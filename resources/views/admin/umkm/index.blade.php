@extends('layouts.admin')
@section('title', 'Kelola UMKM')
@section('page-title', 'Kelola UMKM')

@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-500 text-sm">Total {{ $umkms->total() }} UMKM</p>
    <a href="{{ route('admin.umkm.create') }}"
       class="bg-[#012d1d] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors flex items-center gap-2">
        <span class="material-symbols-outlined text-base">add</span>
        Tambah UMKM
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse($umkms as $umkm)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="h-40 bg-gray-100 overflow-hidden">
            @if($umkm->image)
                <img src="{{ Storage::url($umkm->image) }}"
                     class="w-full h-full object-cover"/>
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-4xl text-gray-300">storefront</span>
                </div>
            @endif
        </div>
        <div class="p-4">
            <div class="flex items-start justify-between gap-2 mb-2">
                <h4 class="font-semibold text-gray-800">{{ $umkm->name }}</h4>
                @if($umkm->is_active)
                <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full shrink-0">Aktif</span>
                @else
                <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full shrink-0">Nonaktif</span>
                @endif
            </div>
            <p class="text-xs text-gray-500 mb-1">{{ $umkm->category }} &mdash; {{ $umkm->owner }}</p>
            <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ $umkm->description }}</p>
            <div class="flex gap-2">
                <a href="{{ route('admin.umkm.edit', $umkm) }}"
                   class="flex-1 text-center bg-blue-50 text-blue-700 py-1.5 rounded-lg text-sm hover:bg-blue-100 transition-colors">
                    Edit
                </a>
                <form method="POST" action="{{ route('admin.umkm.destroy', $umkm) }}"
                      onsubmit="return confirm('Hapus UMKM ini?')" class="flex-1">
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
        Belum ada data UMKM.
    </div>
    @endforelse
</div>

@endsection
