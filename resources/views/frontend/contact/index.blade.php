@extends('layouts.frontend')

@section('title', 'Kontak & Lokasi')

@section('content')

<div class="pt-[100px]">

    {{-- Header --}}
    <div class="bg-primary py-xl">
        <div class="max-w-container-max mx-auto px-gutter text-center">
            <h1 class="font-display-lg text-display-lg-mobile md:text-headline-md text-white mb-md">
                Hubungi Kami
            </h1>
            <p class="text-white/80 font-body-lg max-w-xl mx-auto">
                Kami siap melayani pertanyaan dan kebutuhan warga
                Desa Amanah dengan sepenuh hati.
            </p>
        </div>
    </div>

    {{-- Info Kontak + Maps --}}
    <section class="py-xl max-w-container-max mx-auto px-gutter">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-xl items-start">

            {{-- Info Kontak --}}
            <div class="space-y-lg">
                <div>
                    <h2 class="font-headline-md text-headline-md text-primary mb-lg">
                        Informasi Kontak
                    </h2>
                </div>

                <div class="space-y-md">

                    <div class="flex items-start gap-md p-md bg-white rounded-xl shadow-sm border border-outline-variant/30">
                        <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-title-lg text-primary mb-xs">Alamat Kantor</h4>
                            <p class="text-on-surface-variant">
                                {{ $settings['address'] ?? 'Jl. Raya Desa Amanah No. 1, Kec. Lestari, Kab. Makmur' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-md p-md bg-white rounded-xl shadow-sm border border-outline-variant/30">
                        <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">call</span>
                        </div>
                        <div>
                            <h4 class="font-title-lg text-primary mb-xs">Telepon</h4>
                            <a href="tel:{{ $settings['phone'] ?? '' }}"
                               class="text-on-surface-variant hover:text-primary transition-colors">
                                {{ $settings['phone'] ?? '+62 812-3456-7890' }}
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start gap-md p-md bg-white rounded-xl shadow-sm border border-outline-variant/30">
                        <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">mail</span>
                        </div>
                        <div>
                            <h4 class="font-title-lg text-primary mb-xs">Email</h4>
                            <a href="mailto:{{ $settings['email'] ?? '' }}"
                               class="text-on-surface-variant hover:text-primary transition-colors">
                                {{ $settings['email'] ?? 'kontak@desa-amanah.id' }}
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start gap-md p-md bg-white rounded-xl shadow-sm border border-outline-variant/30">
                        <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">schedule</span>
                        </div>
                        <div>
                            <h4 class="font-title-lg text-primary mb-xs">Jam Pelayanan</h4>
                            <p class="text-on-surface-variant">
                                {{ $settings['office_hours'] ?? 'Senin - Jumat: 08.00 - 15.00 WIB' }}
                            </p>
                        </div>
                    </div>

                    {{-- Tombol WhatsApp --}}
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '62895634707159' }}"
                       target="_blank"
                       class="flex items-center justify-center gap-sm bg-green-600 text-white py-md px-lg rounded-xl font-title-lg hover:-translate-y-1 transition-all shadow-md">
                        <span class="material-symbols-outlined">chat</span>
                        Chat via WhatsApp
                    </a>
                </div>
            </div>

            {{-- Google Maps --}}
            <div class="space-y-md">
                <h2 class="font-headline-md text-headline-md text-primary mb-lg">
                    Lokasi Kantor Desa
                </h2>
                <div class="rounded-xl overflow-hidden shadow-lg border border-outline-variant/30">
                    <iframe
                        src="{{ $settings['maps_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798392!2d107.6!3d-6.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTQnMDAuMCJTIDEwN8KwMzYnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890' }}"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <p class="text-caption text-outline text-center">
                    Klik pada peta untuk membuka di Google Maps
                </p>
            </div>

        </div>
    </section>

</div>
@endsection