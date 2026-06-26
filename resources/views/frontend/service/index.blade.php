@extends('layouts.frontend')

@section('title', 'Layanan Publik')

@section('content')

<div class="pt-[100px]">

    {{-- HERO --}}
    <header class="max-w-container-max mx-auto px-gutter py-xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-lg items-center">
            <div>
                <span class="inline-block px-sm py-xs bg-primary-fixed text-on-primary-fixed rounded-full text-caption mb-md">
                    Pelayanan Terpadu & Akuntabilitas
                </span>
                <h1 class="font-display-lg text-display-lg text-primary mb-md">
                    Melayani dengan Amanah & Transparansi
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-lg">
                    Kami berkomitmen memberikan layanan administrasi yang cepat,
                    tepat, dan terbuka bagi seluruh warga demi kesejahteraan bersama.
                </p>
                <div class="flex gap-md flex-wrap">
                    <a href="#prosedur"
                       class="bg-primary text-on-primary px-lg py-sm rounded-lg font-label-md shadow-md hover:-translate-y-1 transition-all">
                        Lihat Layanan
                    </a>
                    <a href="#transparansi"
                       class="border border-primary text-primary px-lg py-sm rounded-lg font-label-md hover:bg-primary/5 transition-all">
                        Info Anggaran
                    </a>
                </div>
            </div>
            <div class="rounded-xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=800&q=80"
                     alt="Layanan Desa"
                     class="w-full h-[400px] object-cover"/>
            </div>
        </div>
    </header>

    {{-- PROSEDUR LAYANAN --}}
    <section class="py-xl bg-surface-container-low" id="prosedur">
        <div class="max-w-container-max mx-auto px-gutter">
            <div class="text-center mb-xl">
                <h2 class="font-headline-md text-headline-md text-primary mb-sm">
                    Prosedur Layanan Administrasi
                </h2>
                <p class="font-body-md text-on-surface-variant max-w-2xl mx-auto">
                    Langkah-langkah mudah mengurus keperluan administrasi kependudukan.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-md">

                <div class="bg-white p-md rounded-xl border border-outline-variant/30 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary">badge</span>
                    </div>
                    <h3 class="font-title-lg text-title-lg text-primary mb-sm">Pembuatan KTP/KIA</h3>
                    <ul class="space-y-sm font-body-md text-on-surface-variant">
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">1.</span> Ambil formulir di Kantor Desa</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">2.</span> Fotokopi Kartu Keluarga</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">3.</span> Pas foto 3x4 (2 lembar)</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">4.</span> Verifikasi data oleh petugas</li>
                    </ul>
                </div>

                <div class="bg-white p-md rounded-xl border border-outline-variant/30 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary">home_pin</span>
                    </div>
                    <h3 class="font-title-lg text-title-lg text-primary mb-sm">Surat Domisili</h3>
                    <ul class="space-y-sm font-body-md text-on-surface-variant">
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">1.</span> Surat Pengantar dari RT/RW</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">2.</span> KTP asli dan fotokopi</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">3.</span> Proses di loket administrasi</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">4.</span> Penandatanganan Kepala Desa</li>
                    </ul>
                </div>

                <div class="bg-white p-md rounded-xl border border-outline-variant/30 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-primary-fixed rounded-lg flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-primary">description</span>
                    </div>
                    <h3 class="font-title-lg text-title-lg text-primary mb-sm">Akta Kelahiran</h3>
                    <ul class="space-y-sm font-body-md text-on-surface-variant">
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">1.</span> Surat Keterangan Lahir</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">2.</span> Fotokopi Buku Nikah orang tua</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">3.</span> Fotokopi KK & KTP orang tua</li>
                        <li class="flex items-start gap-xs"><span class="text-secondary font-bold">4.</span> Pengajuan via Kantor Desa</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- TRANSPARANSI DANA --}}
    <section class="py-xl" id="transparansi">
        <div class="max-w-container-max mx-auto px-gutter">
            <div class="flex flex-col md:flex-row gap-xl items-center">
                <div class="w-full md:w-1/2">
                    <span class="font-label-md text-secondary font-bold uppercase tracking-widest">
                        Akuntabilitas Publik
                    </span>
                    <h2 class="font-headline-md text-headline-md text-primary mb-md">
                        Transparansi Dana Desa {{ date('Y') }}
                    </h2>
                    <p class="font-body-md text-on-surface-variant mb-lg">
                        Laporan alokasi anggaran pembangunan dan pemberdayaan masyarakat.
                        Warga berhak mengetahui setiap rupiah yang digunakan.
                    </p>
                    <div class="space-y-md">
                        @php
                            $budgets = [
                                ['label' => 'Pembangunan Infrastruktur', 'pct' => 45, 'color' => 'bg-primary'],
                                ['label' => 'Pemberdayaan Ekonomi (BUMDes)', 'pct' => 30, 'color' => 'bg-secondary'],
                                ['label' => 'Kesehatan & Pendidikan', 'pct' => 25, 'color' => 'bg-tertiary-fixed-dim'],
                            ];
                        @endphp
                        @foreach($budgets as $budget)
                        <div>
                            <div class="flex justify-between mb-xs">
                                <span class="font-label-md">{{ $budget['label'] }}</span>
                                <span class="font-label-md font-bold">{{ $budget['pct'] }}%</span>
                            </div>
                            <div class="w-full bg-surface-container-high h-2 rounded-full overflow-hidden">
                                <div class="{{ $budget['color'] }} h-full rounded-full transition-all duration-1000"
                                     style="width: {{ $budget['pct'] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full md:w-1/2 grid grid-cols-2 gap-md">
                    <div class="bg-primary-container text-on-primary-container p-md rounded-xl flex flex-col justify-between aspect-square">
                        <span class="material-symbols-outlined text-5xl opacity-50">payments</span>
                        <div>
                            <p class="font-label-md">Total Anggaran</p>
                            <h4 class="font-headline-md text-white text-2xl font-bold">Rp 2.4 M</h4>
                        </div>
                    </div>
                    <div class="bg-surface-container-high p-md rounded-xl flex flex-col justify-between aspect-square">
                        <span class="material-symbols-outlined text-primary text-5xl opacity-50">engineering</span>
                        <div>
                            <p class="font-label-md text-on-surface-variant">Proyek Berjalan</p>
                            <h4 class="font-headline-md text-primary text-2xl font-bold">12 Titik</h4>
                        </div>
                    </div>
                    <div class="col-span-2 bg-secondary-fixed p-md rounded-xl flex items-center gap-md">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-secondary text-3xl">groups</span>
                        </div>
                        <div>
                            <h4 class="font-title-lg text-on-secondary-fixed">Target Penerima Manfaat</h4>
                            <p class="font-body-md text-on-secondary-fixed/80">4.520 Warga Desa Amanah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA KE PENGADUAN --}}
    <section class="py-xl bg-primary">
        <div class="max-w-container-max mx-auto px-gutter text-center">
            <h2 class="font-headline-md text-headline-md text-white mb-md">
                Ada Keluhan atau Saran?
            </h2>
            <p class="text-white/80 mb-lg">
                Sampaikan langsung kepada kami melalui form pengaduan.
            </p>
            <a href="{{ route('complaint.create') }}"
               class="inline-block bg-secondary text-white font-title-lg px-lg py-md rounded-xl hover:-translate-y-1 transition-all shadow-lg">
                Buat Pengaduan
            </a>
        </div>
    </section>

</div>
@endsection