@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')

{{-- ========================================
     HERO SECTION
     ======================================== --}}
<section class="relative h-[921px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1600&q=80"
             alt="Pemandangan Desa Amanah"
             class="w-full h-full object-cover"/>
        <div class="absolute inset-0 hero-overlay"></div>
    </div>
    <div class="relative z-10 text-center px-gutter max-w-[800px]">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-md">
            Selamat Datang di {{ $profile->village_name ?? 'Desa Amanah' }}:
            Harmoni Alam & Kearifan Lokal
        </h1>
        <p class="font-body-lg text-body-lg text-white/90 mb-lg">
            Menemukan kedamaian di antara perbukitan hijau dan masyarakat yang
            menjunjung tinggi semangat gotong royong.
        </p>
        <div class="flex flex-col sm:flex-row gap-md justify-center">
            <a href="{{ route('profile') }}"
               class="bg-primary-fixed text-on-primary-fixed font-title-lg px-lg py-md rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer text-center">
                Jelajahi Desa
            </a>
            <a href="{{ route('potential') }}"
               class="bg-white/10 backdrop-blur-md border border-white/30 text-white font-title-lg px-lg py-md rounded-xl hover:bg-white/20 transition-all cursor-pointer text-center">
                Lihat Potensi
            </a>
        </div>
    </div>
</section>

{{-- ========================================
     VISI & MISI SECTION
     ======================================== --}}
<section class="py-xl bg-surface-container-lowest">
    <div class="max-w-container-max mx-auto px-gutter grid md:grid-cols-2 gap-xl items-center">
        <div class="relative rounded-2xl overflow-hidden aspect-video shadow-xl">
            <img src="https://images.unsplash.com/photo-1442544213729-6a15f1611937?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                 alt="Warga Desa Amanah"
                 class="w-full h-full object-cover"/>
        </div>
        <div class="space-y-md">
            <div class="inline-block bg-tertiary-fixed text-on-tertiary-fixed-variant px-sm py-xs rounded-full font-label-md">
                Visi & Misi Kami
            </div>
            <h2 class="font-headline-md text-headline-md text-primary">
                Membangun Masa Depan yang Amanah dan Berkelanjutan
            </h2>
            <div class="space-y-md">
                <div class="flex gap-md">
                    <span class="material-symbols-outlined text-secondary text-3xl">verified</span>
                    <div>
                        <h3 class="font-title-lg text-title-lg">Visi</h3>
                        <p class="text-on-surface-variant">{{ $profile->vision ?? '' }}</p>
                    </div>
                </div>
                <div class="flex gap-md">
                    <span class="material-symbols-outlined text-secondary text-3xl">diversity_3</span>
                    <div>
                        <h3 class="font-title-lg text-title-lg">Misi</h3>
                        <p class="text-on-surface-variant">
                            Meningkatkan kesejahteraan warga melalui penguatan ekonomi lokal
                            dan tata kelola pemerintahan yang transparan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================
     STATISTIK DESA SECTION
     ======================================== --}}
<section class="bg-primary py-xl text-on-primary overflow-hidden relative">
    <div class="absolute right-0 top-0 opacity-10 pointer-events-none">
        <span class="material-symbols-outlined" style="font-size: 300px;">nature_people</span>
    </div>
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg text-center">
            @foreach($statistics as $stat)
            <div class="p-md bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10">
                <span class="material-symbols-outlined text-secondary-fixed-dim mb-sm" style="font-size: 48px;">
                    {{ $stat->icon }}
                </span>
                <div class="font-display-lg text-secondary-fixed-dim" style="font-size: 48px; font-weight: 700;">
                    {{ $stat->value }}
                    @if($stat->unit) <span class="text-2xl">{{ $stat->unit }}</span> @endif
                </div>
                <div class="font-label-md uppercase tracking-widest opacity-80">
                    {{ $stat->label }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================
     BERITA TERBARU SECTION
     ======================================== --}}
<section class="py-xl bg-background">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex justify-between items-end mb-lg">
            <div>
                <h2 class="font-headline-md text-headline-md text-primary">Berita Desa Terbaru</h2>
                <p class="text-on-surface-variant">Informasi terkini kegiatan dan program Desa Amanah.</p>
            </div>
            <a href="{{ route('news.index') }}"
               class="flex items-center gap-xs text-primary font-semibold hover:gap-md transition-all">
                Lihat Semua <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            @forelse($latestNews as $item)
            <article class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all flex flex-col">
                <div class="aspect-video relative overflow-hidden">
                    @if($item->image)
                        <img src="{{ Storage::url($item->image) }}"
                             alt="{{ $item->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                    @else
                        <div class="w-full h-full bg-surface-container flex items-center justify-center">
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
                    <p class="text-body-md text-on-surface-variant line-clamp-2">
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
            <div class="col-span-3 text-center py-lg text-on-surface-variant">
                <span class="material-symbols-outlined text-5xl mb-md block">article</span>
                Belum ada berita tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ========================================
     GALERI KEGIATAN SECTION
     ======================================== --}}
<section class="py-xl bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="mb-lg">
            <h2 class="font-headline-md text-headline-md text-primary mb-2">Galeri Kegiatan Warga</h2>
            <p class="text-on-surface-variant max-w-2xl">
                Melihat lebih dekat kebersamaan dan semangat gotong royong masyarakat
                Desa Amanah dalam berbagai aktivitas.
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-md">
            @forelse($galleries as $gallery)
            <div class="overflow-hidden rounded-lg shadow-sm group relative">
                @if($gallery->image)
                    <img src="{{ Str::startsWith($gallery->image, 'http') ? $gallery->image : Storage::url($gallery->image) }}"
                         alt="{{ $gallery->title }}"
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"/>
                @else
                    <div class="w-full h-64 bg-surface-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-5xl text-outline">image</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/30 transition-all flex items-end">
                    <p class="text-white font-label-md p-md opacity-0 group-hover:opacity-100 transition-all">
                        {{ $gallery->title }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-lg text-on-surface-variant">
                Belum ada foto galeri.
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ========================================
     CTA PENGADUAN SECTION
     ======================================== --}}
<section class="py-xl bg-primary">
    <div class="max-w-container-max mx-auto px-gutter text-center">
        <h2 class="font-headline-md text-headline-md text-on-primary mb-md">
            Ada Saran atau Pengaduan?
        </h2>
        <p class="text-on-primary/80 font-body-lg mb-lg max-w-2xl mx-auto">
            Kami siap mendengar dan merespons setiap masukan dari warga demi
            pelayanan yang lebih baik.
        </p>
        <a href="{{ route('complaint.create') }}"
           class="inline-block bg-secondary text-white font-title-lg px-lg py-md rounded-xl hover:bg-secondary/90 hover:-translate-y-1 transition-all shadow-lg">
            Sampaikan Pengaduan
        </a>
    </div>
</section>

@endsection