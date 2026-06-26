@extends('layouts.frontend')

@section('title', 'Potensi & UMKM')

@section('content')

{{-- HERO --}}
<section class="relative h-[614px] flex items-center justify-center overflow-hidden mb-xl mx-gutter rounded-xl mt-[100px]">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1555400038-63f5ba517a47?w=1600&q=80"
             alt="Potensi Desa"
             class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-primary/40"></div>
    </div>
    <div class="relative z-10 text-center text-white max-w-3xl px-md">
        <h1 class="font-display-lg text-display-lg mb-md">Potensi & Kebanggaan Lokal</h1>
        <p class="font-body-lg text-body-lg">
            Menemukan harmoni antara warisan alam yang asri dan kreativitas
            masyarakat dalam membangun ekonomi mandiri.
        </p>
    </div>
</section>

{{-- DESTINASI WISATA (BENTO GRID) --}}
<section class="max-w-container-max mx-auto px-gutter mb-xl">
    <div class="mb-lg">
        <h2 class="font-headline-md text-headline-md text-primary mb-xs">Destinasi Wisata</h2>
        <div class="w-20 h-1 bg-secondary rounded-full"></div>
    </div>

    @if($tourismPlaces->count() >= 2)
    <div class="grid grid-cols-1 md:grid-cols-12 gap-md"
         style="height: auto; min-height: 600px;">

        {{-- Card Besar (featured pertama) --}}
        @php $featured = $tourismPlaces->take(4); @endphp

        <div class="md:col-span-8 group relative rounded-xl overflow-hidden bento-item shadow-sm min-h-[300px]">
            @if($featured[0]->image ?? false)
                <img src="{{ Storage::url($featured[0]->image) }}"
                     alt="{{ $featured[0]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @else
                <img src="https://images.unsplash.com/photo-1455763916899-e8b50eca9967?w=1000&q=80"
                     alt="{{ $featured[0]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-lg">
                <span class="text-secondary-fixed font-label-md mb-xs">{{ $featured[0]->category }}</span>
                <h3 class="text-white font-headline-md mb-sm">{{ $featured[0]->name }}</h3>
                <p class="text-white/80 font-body-md max-w-lg">{{ $featured[0]->description }}</p>
            </div>
        </div>

        {{-- Card Kecil (featured kedua) --}}
        <div class="md:col-span-4 group relative rounded-xl overflow-hidden bento-item shadow-sm min-h-[200px]">
            @if($featured[1]->image ?? false)
                <img src="{{ Storage::url($featured[1]->image) }}"
                     alt="{{ $featured[1]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @else
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&q=80"
                     alt="{{ $featured[1]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-lg">
                <span class="text-secondary-fixed font-label-md mb-xs">{{ $featured[1]->category }}</span>
                <h3 class="text-white font-title-lg">{{ $featured[1]->name }}</h3>
            </div>
        </div>

        @if(isset($featured[2]))
        <div class="md:col-span-4 group relative rounded-xl overflow-hidden bento-item shadow-sm min-h-[200px]">
            @if($featured[2]->image ?? false)
                <img src="{{ Storage::url($featured[2]->image) }}"
                     alt="{{ $featured[2]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @else
                <img src="https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=600&q=80"
                     alt="{{ $featured[2]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-lg">
                <h3 class="text-white font-title-lg">{{ $featured[2]->name }}</h3>
            </div>
        </div>
        @endif

        @if(isset($featured[3]))
        <div class="md:col-span-8 group relative rounded-xl overflow-hidden bento-item shadow-sm min-h-[200px]">
            @if($featured[3]->image ?? false)
                <img src="{{ Storage::url($featured[3]->image) }}"
                     alt="{{ $featured[3]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @else
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=1000&q=80"
                     alt="{{ $featured[3]->name }}"
                     class="w-full h-full object-cover absolute inset-0"/>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-lg">
                <h3 class="text-white font-headline-md">{{ $featured[3]->name }}</h3>
            </div>
        </div>
        @endif

    </div>
    @endif
</section>

{{-- PRODUK UMKM --}}
<section class="bg-surface-container py-xl">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-xl">
            <h2 class="font-headline-md text-headline-md text-primary mb-sm">
                Produk Unggulan UMKM
            </h2>
            <p class="font-body-md text-on-surface-variant max-w-2xl mx-auto">
                Mendukung ekonomi lokal melalui karya tangan kreatif dan hasil bumi
                terbaik dari masyarakat desa.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            @forelse($umkms as $umkm)
            <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all group">
                <div class="h-64 overflow-hidden bg-surface-container flex items-center justify-center">
                    @if($umkm->image)
                        <img src="{{ Storage::url($umkm->image) }}"
                             alt="{{ $umkm->name }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                    @else
                        <span class="material-symbols-outlined text-6xl text-outline">storefront</span>
                    @endif
                </div>
                <div class="p-md">
                    <div class="flex justify-between items-start mb-sm">
                        <h4 class="font-title-lg text-primary">{{ $umkm->name }}</h4>
                        <span class="bg-primary-fixed text-on-primary-fixed-variant px-sm py-xs rounded-full text-caption whitespace-nowrap ml-2">
                            {{ $umkm->category }}
                        </span>
                    </div>
                    <p class="font-body-md text-on-surface-variant mb-sm">
                        {{ $umkm->description }}
                    </p>
                    @if($umkm->owner)
                    <p class="text-caption text-outline mb-md">
                        Pemilik: {{ $umkm->owner }}
                    </p>
                    @endif
                    @if($umkm->contact)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->contact) }}"
                       target="_blank"
                       class="w-full py-sm bg-primary text-white rounded-lg font-label-md hover:bg-primary-container transition-colors flex items-center justify-center gap-xs">
                        <span class="material-symbols-outlined text-sm">chat</span>
                        Hubungi Penjual
                    </a>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-lg text-on-surface-variant">
                Belum ada produk UMKM tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection