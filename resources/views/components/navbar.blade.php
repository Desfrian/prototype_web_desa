<header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
    <nav class="flex justify-between items-center max-w-container-max mx-auto px-gutter py-md">

        {{-- Logo / Nama Desa --}}
        <a href="{{ route('home') }}" class="font-headline-md text-headline-md font-bold text-primary">
            Desa Amanah
        </a>

        {{-- Menu Desktop --}}
        <div class="hidden md:flex gap-lg items-center">
            <a href="{{ route('home') }}"
               class="font-label-md text-label-md transition-all cursor-pointer active:scale-95 duration-200
                      {{ request()->routeIs('home') ? 'text-primary border-b-2 border-secondary font-semibold pb-1' : 'text-on-surface-variant hover:text-primary' }}">
                Beranda
            </a>
            <a href="{{ route('profile') }}"
               class="font-label-md text-label-md transition-all cursor-pointer active:scale-95 duration-200
                      {{ request()->routeIs('profile') ? 'text-primary border-b-2 border-secondary font-semibold pb-1' : 'text-on-surface-variant hover:text-primary' }}">
                Profil
            </a>
            <a href="{{ route('potential') }}"
               class="font-label-md text-label-md transition-all cursor-pointer active:scale-95 duration-200
                      {{ request()->routeIs('potential') ? 'text-primary border-b-2 border-secondary font-semibold pb-1' : 'text-on-surface-variant hover:text-primary' }}">
                Potensi
            </a>
            <a href="{{ route('service') }}"
               class="font-label-md text-label-md transition-all cursor-pointer active:scale-95 duration-200
                      {{ request()->routeIs('service') ? 'text-primary border-b-2 border-secondary font-semibold pb-1' : 'text-on-surface-variant hover:text-primary' }}">
                Layanan
            </a>
            <a href="{{ route('news.index') }}"
               class="font-label-md text-label-md transition-all cursor-pointer active:scale-95 duration-200
                      {{ request()->routeIs('news.*') ? 'text-primary border-b-2 border-secondary font-semibold pb-1' : 'text-on-surface-variant hover:text-primary' }}">
                Berita
            </a>
            <a href="{{ route('contact') }}"
               class="font-label-md text-label-md transition-all cursor-pointer active:scale-95 duration-200
                      {{ request()->routeIs('contact') ? 'text-primary border-b-2 border-secondary font-semibold pb-1' : 'text-on-surface-variant hover:text-primary' }}">
                Kontak
            </a>
        </div>

        {{-- Kanan: Hamburger (Mobile) --}}
        <div class="flex items-center gap-4">
            <button id="mobile-menu-btn" class="md:hidden text-primary focus:outline-none">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>

    </nav>

    {{-- Menu Mobile Dropdown --}}
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white border-b border-outline-variant/30 shadow-lg py-4 px-gutter flex flex-col gap-4">
        <a href="{{ route('home') }}" class="block font-label-md {{ request()->routeIs('home') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Beranda</a>
        <a href="{{ route('profile') }}" class="block font-label-md {{ request()->routeIs('profile') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Profil</a>
        <a href="{{ route('potential') }}" class="block font-label-md {{ request()->routeIs('potential') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Potensi</a>
        <a href="{{ route('service') }}" class="block font-label-md {{ request()->routeIs('service') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Layanan</a>
        <a href="{{ route('news.index') }}" class="block font-label-md {{ request()->routeIs('news.*') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Berita</a>
        <a href="{{ route('contact') }}" class="block font-label-md {{ request()->routeIs('contact') ? 'text-primary font-bold' : 'text-on-surface-variant' }}">Kontak</a>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = btn.querySelector('.material-symbols-outlined');

        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                icon.textContent = menu.classList.contains('hidden') ? 'menu' : 'close';
            });
        }
    });
</script>