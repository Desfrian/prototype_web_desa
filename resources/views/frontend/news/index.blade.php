@extends('layouts.frontend')

@section('title', 'Berita Desa')

@section('content')

<div class="pt-[100px]">

    {{-- Header --}}
    <div class="bg-primary py-xl">
        <div class="max-w-container-max mx-auto px-gutter text-center">
            <h1 class="font-display-lg text-display-lg-mobile md:text-headline-md text-white mb-md">
                Berita & Informasi Desa
            </h1>
            <p class="text-white/80 font-body-lg max-w-2xl mx-auto">
                Ikuti perkembangan terkini kegiatan, program, dan pembangunan
                di Desa Amanah.
            </p>
        </div>
    </div>

    {{-- Daftar Berita --}}
    <section class="py-xl max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            @forelse($news as $item)
            <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-surface-container">
                    @if($item->image)
                        <img src="{{ Storage::url($item->image) }}"
                             alt="{{ $item->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-outline">article</span>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-tertiary text-white px-3 py-1 rounded-full text-caption">
                        {{ $item->category }}
                    </div>
                </div>
                <div class="p-md flex-grow space-y-sm">
                    <time class="text-caption text-outline">
                        {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                    </time>
                    <h3 class="font-title-lg text-title-lg group-hover:text-primary transition-colors">
                        {{ $item->title }}
                    </h3>
                    <p class="text-body-md text-on-surface-variant line-clamp-3">
                        {{ $item->excerpt }}
                    </p>
                </div>
                <div class="p-md pt-0">
                    <a href="{{ route('news.show', $item->slug) }}"
                       class="text-primary font-label-md flex items-center gap-xs hover:gap-sm transition-all">
                        Baca Selengkapnya
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-xl">
                <span class="material-symbols-outlined text-6xl text-outline block mb-md">article</span>
                <p class="text-on-surface-variant">Belum ada berita tersedia.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($news->hasPages())
        <div class="mt-xl flex justify-center">
            {{ $news->links() }}
        </div>
        @endif
    </section>

</div>
@endsection