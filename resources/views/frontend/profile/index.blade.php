@extends('layouts.frontend')

@section('title', 'Profil Desa')

@section('content')

{{-- HERO --}}
<section class="relative h-[614px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b?w=1600&q=80"
             alt="Profil Desa"
             class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-primary/40 mix-blend-multiply"></div>
    </div>
    <div class="relative z-10 text-center px-gutter max-w-4xl pt-xl">
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-md">
            Menelusuri Jejak Amanah di Bumi Pertiwi
        </h1>
        <p class="font-body-lg text-body-lg text-white/90">
            Membangun harmoni antara tradisi luhur dan kemajuan modern
            dalam semangat Gotong Royong.
        </p>
    </div>
</section>

{{-- SEJARAH DESA --}}
<section class="py-xl max-w-container-max mx-auto px-gutter">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-md items-center">
        <div class="md:col-span-8 flex flex-col justify-center">
            <span class="text-secondary font-label-md uppercase tracking-widest mb-xs">
                Warisan Leluhur
            </span>
            <h2 class="font-headline-md text-headline-md text-primary mb-md">
                Sejarah {{ $profile->village_name }}
            </h2>
            <div class="space-y-md text-on-surface-variant leading-relaxed">
                @foreach(explode("\n", $profile->history) as $paragraph)
                    @if(trim($paragraph))
                        <p>{{ trim($paragraph) }}</p>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="md:col-span-4 relative group">
            <div class="aspect-[3/4] overflow-hidden rounded-xl shadow-lg transform group-hover:-translate-y-2 transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=600&q=80"
                     alt="Sejarah Desa"
                     class="w-full h-full object-cover"/>
            </div>
            <div class="absolute -bottom-md -left-md bg-secondary text-white p-md rounded-lg shadow-xl hidden md:block">
                <div class="text-4xl font-bold">
                    {{ $profile->established_year ? (date('Y') - $profile->established_year) . '+' : '179+' }}
                </div>
                <div class="text-caption">Tahun Perjalanan</div>
            </div>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="py-xl bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-lg">
            <h2 class="font-headline-md text-headline-md text-primary mb-sm">Visi & Misi</h2>
            <div class="w-20 h-1 bg-secondary rounded-full mx-auto"></div>
        </div>
        <div class="grid md:grid-cols-2 gap-lg">
            {{-- Visi --}}
            <div class="bg-white rounded-2xl p-lg shadow-sm border border-outline-variant/30">
                <div class="flex items-center gap-md mb-md">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white">verified</span>
                    </div>
                    <h3 class="font-title-lg text-title-lg text-primary">Visi</h3>
                </div>
                <p class="text-on-surface-variant leading-relaxed">{{ $profile->vision }}</p>
            </div>
            {{-- Misi --}}
            <div class="bg-white rounded-2xl p-lg shadow-sm border border-outline-variant/30">
                <div class="flex items-center gap-md mb-md">
                    <div class="w-12 h-12 bg-secondary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white">diversity_3</span>
                    </div>
                    <h3 class="font-title-lg text-title-lg text-primary">Misi</h3>
                </div>
                <div class="text-on-surface-variant leading-relaxed space-y-sm">
                    @foreach(explode("\n", $profile->mission) as $misi)
                        @if(trim($misi))
                            <p>{{ trim($misi) }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STRUKTUR ORGANISASI --}}
<section class="py-xl">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="text-center mb-xl">
            <h2 class="font-headline-md text-headline-md text-primary mb-sm">
                Kepemimpinan Desa
            </h2>
            <p class="text-on-surface-variant max-w-2xl mx-auto">
                Para abdi masyarakat yang mendedikasikan diri untuk kemajuan
                {{ $profile->village_name }}.
            </p>
        </div>

        @php $kepala = $officials->firstWhere('order', 1); @endphp

        {{-- Kepala Desa --}}
        @if($kepala)
        <div class="flex flex-col items-center mb-lg">
            <div class="bg-white p-md rounded-xl text-center w-64 shadow-sm border-t-4 border-primary">
                <div class="w-24 h-24 mx-auto mb-md rounded-full overflow-hidden border-2 border-outline-variant bg-surface-container flex items-center justify-center">
                    @if($kepala->photo)
                        <img src="{{ Storage::url($kepala->photo) }}"
                             alt="{{ $kepala->name }}"
                             class="w-full h-full object-cover"/>
                    @else
                        <span class="material-symbols-outlined text-4xl text-outline">person</span>
                    @endif
                </div>
                <h3 class="font-title-lg text-title-lg text-primary">{{ $kepala->name }}</h3>
                <p class="text-secondary font-label-md">{{ $kepala->position }}</p>
            </div>
            <div class="hidden md:block w-px h-12 bg-outline-variant"></div>
        </div>
        @endif

        {{-- Perangkat Lainnya --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg max-w-5xl mx-auto">
            @foreach($officials->where('order', '>', 1) as $official)
            <div class="bg-white p-md rounded-xl text-center shadow-sm border-t-4 border-tertiary hover:shadow-md transition-all">
                <div class="w-20 h-20 mx-auto mb-md rounded-full overflow-hidden border-2 border-outline-variant bg-surface-container flex items-center justify-center">
                    @if($official->photo)
                        <img src="{{ Storage::url($official->photo) }}"
                             alt="{{ $official->name }}"
                             class="w-full h-full object-cover"/>
                    @else
                        <span class="material-symbols-outlined text-3xl text-outline">person</span>
                    @endif
                </div>
                <h4 class="font-title-lg text-title-lg text-primary">{{ $official->name }}</h4>
                <p class="text-on-tertiary-container font-label-md">{{ $official->position }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- DEMOGRAFI --}}
<section class="py-xl bg-surface-container-low">
    <div class="max-w-container-max mx-auto px-gutter">
        <div class="flex flex-col md:flex-row gap-xl items-center">
            <div class="flex-1">
                <h2 class="font-headline-md text-headline-md text-primary mb-md">
                    Potret Demografi
                </h2>
                <p class="text-on-surface-variant mb-lg">
                    Keberagaman penduduk adalah kekuatan kami.
                </p>
                <div class="space-y-md">
                    @foreach($statistics as $stat)
                    <div class="flex items-center gap-md">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">
                            <span class="material-symbols-outlined">{{ $stat->icon }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between mb-xs">
                                <span class="font-label-md">{{ $stat->label }}</span>
                                <span class="font-label-md text-primary font-semibold">
                                    {{ $stat->value }} {{ $stat->unit }}
                                </span>
                            </div>
                            <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                                <div class="bg-primary h-full rounded-full"
                                     style="width: {{ min(100, ($loop->index + 1) * 15 + 25) }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex-1 grid grid-cols-2 gap-md">
                @foreach($statistics->take(4) as $stat)
                <div class="
                    {{ $loop->index === 0 ? 'bg-primary text-white' : ($loop->index === 3 ? 'bg-primary-container text-on-primary-container' : 'bg-surface-container') }}
                    p-lg rounded-2xl text-center flex flex-col items-center justify-center">
                    <span class="material-symbols-outlined text-4xl mb-sm
                        {{ $loop->index === 0 ? 'text-white' : ($loop->index === 1 ? 'text-secondary' : 'text-tertiary') }}">
                        {{ $stat->icon }}
                    </span>
                    <div class="text-3xl font-bold {{ $loop->index === 0 || $loop->index === 3 ? '' : 'text-primary' }}">
                        {{ $stat->value }}
                    </div>
                    <div class="text-caption {{ $loop->index === 0 ? 'text-white/80' : 'text-on-surface-variant' }}">
                        {{ $stat->label }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection