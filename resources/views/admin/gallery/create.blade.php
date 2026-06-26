@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')
@section('page-title', 'Tambah Foto Galeri')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.gallery.store') }}"
          enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Foto *</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       placeholder="Contoh: Panen Raya 2026"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none @error('title') border-red-400 @enderror"/>
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Caption</label>
                <textarea name="caption" rows="2"
                          placeholder="Deskripsi singkat foto (opsional)..."
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none">{{ old('caption') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto *</label>
                <input type="file" name="image" accept="image/*" required
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-50 file:text-green-700 @error('image') border-red-400 @enderror"/>
                <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, WEBP. Maks 2MB.</p>
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

        </div>
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-[#012d1d] text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                Simpan
            </button>
            <a href="{{ route('admin.gallery.index') }}"
               class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
