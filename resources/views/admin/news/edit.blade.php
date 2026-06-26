@extends('layouts.admin')
@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')

<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.news.update', $news) }}"
          enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Judul Berita <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title"
                       value="{{ old('title', $news->title) }}"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none"/>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                        @foreach(['Program Unggulan','Pembangunan','Budaya','Infrastruktur','Kesehatan','Pariwisata','Ekonomi'] as $cat)
                        <option value="{{ $cat }}"
                                {{ old('category', $news->category) === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none">
                        <option value="draft" {{ old('status', $news->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $news->status) === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan</label>
                <textarea name="excerpt" rows="2"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-none">{{ old('excerpt', $news->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Isi Berita <span class="text-red-500">*</span>
                </label>
                <textarea name="content" rows="10"
                          class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-green-600 outline-none resize-y">{{ old('content', $news->content) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Berita</label>
                @if($news->image)
                <div class="mb-3">
                    <img src="{{ Storage::url($news->image) }}"
                         class="w-32 h-24 object-cover rounded-lg border border-gray-200"/>
                    <p class="text-xs text-gray-400 mt-1">Foto saat ini. Upload baru untuk mengganti.</p>
                </div>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-50 file:text-green-700"/>
            </div>

        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-[#012d1d] text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-[#1b4332] transition-colors">
                Perbarui Berita
            </button>
            <a href="{{ route('admin.news.index') }}"
               class="bg-gray-100 text-gray-700 px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                Batal
            </a>
        </div>

    </form>
</div>

@endsection