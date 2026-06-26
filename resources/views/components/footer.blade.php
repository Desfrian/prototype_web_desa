<footer class="bg-primary w-full mt-xl">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-lg max-w-container-max mx-auto px-gutter py-xl">

        {{-- Kolom 1: Tentang Desa --}}
        <div class="col-span-1 md:col-span-1">
            <div class="font-headline-md text-headline-md text-on-primary mb-md">
                Desa Amanah
            </div>
            <p class="text-on-primary/80 font-body-md">
                Pemerintah desa yang transparan, akuntabel, dan melayani sepenuh hati demi kemajuan bersama.
            </p>
        </div>

        {{-- Kolom 2: Layanan --}}
        <div>
            <h4 class="text-on-primary font-title-lg mb-md">Layanan</h4>
            <ul class="list-none space-y-2">
                <li>
                    <a href="{{ route('service') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        Administrasi Online
                    </a>
                </li>
                <li>
                    <a href="{{ route('complaint.create') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        Pengaduan Warga
                    </a>
                </li>
                <li>
                    <a href="{{ route('service') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        Info Layanan
                    </a>
                </li>
            </ul>
        </div>

        {{-- Kolom 3: Tautan Cepat --}}
        <div>
            <h4 class="text-on-primary font-title-lg mb-md">Tautan Cepat</h4>
            <ul class="list-none space-y-2">
                <li>
                    <a href="{{ route('profile') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        Profil Desa
                    </a>
                </li>
                <li>
                    <a href="{{ route('service') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        Transparansi
                    </a>
                </li>
                <li>
                    <a href="{{ route('potential') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        Wisata
                    </a>
                </li>
                <li>
                    <a href="{{ route('potential') }}"
                       class="text-on-primary/80 hover:text-white transition-transform duration-300 hover:translate-x-1 inline-block">
                        UMKM
                    </a>
                </li>
            </ul>
        </div>

        {{-- Kolom 4: Kontak --}}
        <div>
            <h4 class="text-on-primary font-title-lg mb-md">Hubungi Kami</h4>
            <ul class="list-none space-y-2 text-on-primary/80">
                <li class="flex items-start gap-sm">
                    <span class="material-symbols-outlined text-base mt-1">location_on</span>
                    <span>Jl. Raya Desa Amanah No. 1, Kec. Lestari, Kab. Makmur</span>
                </li>
                <li class="flex items-center gap-sm">
                    <span class="material-symbols-outlined text-base">mail</span>
                    <span>kontak@desa-amanah.id</span>
                </li>
                <li class="flex items-center gap-sm">
                    <span class="material-symbols-outlined text-base">call</span>
                    <span>+62 812-3456-7890</span>
                </li>
            </ul>
        </div>
    </div>

    {{-- Copyright Bar --}}
    <div class="border-t border-white/10 max-w-container-max mx-auto px-gutter py-md flex flex-col md:flex-row justify-between items-center gap-md">
        <p class="text-on-primary/60 text-caption">
            © {{ date('Y') }} Pemerintah Desa Amanah. Gotong Royong Membangun Bangsa.
        </p>
        <div class="flex gap-md">
            <a href="#" class="text-on-primary/60 hover:text-white text-caption">Privacy Policy</a>
            <a href="#" class="text-on-primary/60 hover:text-white text-caption">Terms of Service</a>
        </div>
    </div>
</footer>