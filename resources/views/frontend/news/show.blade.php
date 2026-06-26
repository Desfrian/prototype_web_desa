@extends('layouts.frontend')

@section('title', $news->title)

@section('content')

<div class="pt-[100px]">
    <article class="max-w-4xl mx-auto px-gutter py-xl">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-xs text-caption text-outline mb-lg">
            <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <a href="{{ route('news.index') }}" class="hover:text-primary">Berita</a>
            <span class="material-symbols-outlined text-sm">chevron_right</span>
            <span class="text-on-surface">{{ Str::limit($news->title, 40) }}</span>
        </nav>

        {{-- Kategori & Tanggal --}}
        <div class="flex items-center gap-sm mb-md">
            <span class="bg-tertiary text-white px-3 py-1 rounded-full text-caption">
                {{ $news->category }}
            </span>
            <time class="text-caption text-outline">
                {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}
            </time>
            @if($news->author)
            <span class="text-caption text-outline">· {{ $news->author->name }}</span>
            @endif
        </div>

        {{-- Judul --}}
        <h1 class="font-headline-md text-headline-md text-primary mb-lg leading-tight">
            {{ $news->title }}
        </h1>

        {{-- Gambar Utama --}}
        @if($news->image)
        <div class="rounded-xl overflow-hidden mb-lg shadow-md">
            <img src="{{ Storage::url($news->image) }}"
                 alt="{{ $news->title }}"
                 class="w-full h-[400px] object-cover"/>
        </div>
        @endif

        {{-- Isi Berita --}}
        <div class="prose prose-lg max-w-none text-on-surface-variant leading-relaxed space-y-md">
            {!! $news->content !!}
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-xl pt-lg border-t border-outline-variant">
            <a href="{{ route('news.index') }}"
               class="inline-flex items-center gap-xs text-primary font-label-md hover:-translate-x-1 transition-all">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali ke Daftar Berita
            </a>
        </div>
    </article>

    {{-- Berita Terkait --}}
    @if($relatedNews->count() > 0)
    <section class="bg-surface-container-low py-xl">
        <div class="max-w-container-max mx-auto px-gutter">
            <h2 class="font-headline-md text-headline-md text-primary mb-lg">
                Berita Terkait
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
                @foreach($relatedNews as $item)
                <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
                    <div class="aspect-video overflow-hidden bg-surface-container">
                        @if($item->image)
                            <img src="{{ Storage::url($item->image) }}"
                                 alt="{{ $item->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-outline">article</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-md flex-grow">
                        <time class="text-caption text-outline block mb-xs">
                            {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                        </time>
                        <h3 class="font-title-lg text-title-lg group-hover:text-primary transition-colors mb-xs">
                            {{ $item->title }}
                        </h3>
                    </div>
                    <div class="p-md pt-0">
                        <a href="{{ route('news.show', $item->slug) }}"
                           class="text-primary font-label-md flex items-center gap-xs">
                            Baca <span class="material-symbols-outlined text-sm">open_in_new</span>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</div>
@endsection