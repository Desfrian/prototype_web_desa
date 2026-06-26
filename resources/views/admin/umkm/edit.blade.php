@extends('layouts.admin')
@section('title', 'Edit UMKM')
@section('page-title', 'Edit UMKM')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.umkm.update', $umkm) }}"
          enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama UMKM *</label>
                <input type="text" name="name" value="{{ old('name', $umkm->name) }}"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                        @foreach(['Kerajinan','Kuliner','Hasil Bumi','Wastra','Jasa'] as $cat)
                        <option value="{{ $cat }}"
                                {{ old('category', $umkm->category) === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                    <input type="number" name="order" value="{{ old('order', $umkm->order) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $umkm->location) }}"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none">{{ old('description', $umkm->description) }}</textarea>
            </div>

            {{-- Pemilik & Kontak --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik</label>
                    <input type="text" name="owner" value="{{ old('owner', $umkm->owner) }}"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kontak (HP/WA)</label>
                    <input type="text" name="contact" value="{{ old('contact', $umkm->contact) }}"
                           placeholder="08xxxxxxxxxx"
                           class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                @if($umkm->image)
                <img src="{{ Storage::url($umkm->image) }}"
                     class="w-32 h-24 object-cover rounded-lg border border-gray-200 mb-2"/>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-50 file:text-green-700"/>
            </div>

            {{-- Status aktif --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                       {{ old('is_active', $umkm->is_active) ? 'checked' : '' }}
                       class="rounded text-green-700 focus:ring-green-600"/>
                <label for="is_active" class="text-sm text-gray-700">UMKM aktif (tampil di website)</label>
            </div>

        </div>
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-[#012d1d] text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                Perbarui
            </button>
            <a href="{{ route('admin.umkm.index') }}"
               class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
