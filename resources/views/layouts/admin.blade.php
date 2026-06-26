<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin Desa Amanah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">

        {{-- Sidebar --}}
        <aside class="w-64 bg-[#012d1d] text-white flex flex-col shrink-0 overflow-y-auto">

            {{-- Logo --}}
            <div class="p-6 border-b border-white/10">
                <h1 class="text-xl font-bold">Desa Amanah</h1>
                <p class="text-xs text-white/60 mt-1">Panel Administrasi</p>
            </div>

            {{-- Info User --}}
            <div class="p-4 border-b border-white/10">
                <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-xs text-white/60">{{ auth()->user()->getRoleNames()->first() }}</p>
            </div>

            {{-- Menu Navigasi --}}
            <nav class="flex-1 p-4 space-y-1">

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">dashboard</span>
                    Dashboard
                </a>

                {{-- Menu Super Admin --}}
                @role('super-admin')
                <div class="pt-3 pb-1">
                    <p class="text-xs text-white/40 uppercase tracking-wider px-3">Manajemen</p>
                </div>
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.users.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">manage_accounts</span>
                    Akun Admin
                </a>
                <a href="{{ route('admin.roles.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.roles.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">admin_panel_settings</span>
                    Role & Akses
                </a>
                <a href="{{ route('admin.settings.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.settings.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">settings</span>
                    Pengaturan
                </a>
                @endrole

                {{-- Menu Konten --}}
                @hasanyrole('super-admin|admin-konten')
                <div class="pt-3 pb-1">
                    <p class="text-xs text-white/40 uppercase tracking-wider px-3">Konten</p>
                </div>
                <a href="{{ route('admin.village.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.village.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">account_balance</span>
                    Profil Desa
                </a>
                <a href="{{ route('admin.news.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.news.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">newspaper</span>
                    Berita
                </a>
                <a href="{{ route('admin.tourism.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.tourism.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">travel_explore</span>
                    Wisata
                </a>
                <a href="{{ route('admin.umkm.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.umkm.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">storefront</span>
                    UMKM
                </a>
                <a href="{{ route('admin.gallery.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.gallery.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">photo_library</span>
                    Galeri
                </a>
                @endhasanyrole

                {{-- Menu Layanan --}}
                @hasanyrole('super-admin|admin-layanan')
                <div class="pt-3 pb-1">
                    <p class="text-xs text-white/40 uppercase tracking-wider px-3">Layanan</p>
                </div>
                <a href="{{ route('admin.complaints.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all
                          {{ request()->routeIs('admin.complaints.*') ? 'bg-white/20 font-semibold' : 'text-white/80 hover:bg-white/10' }}">
                    <span class="material-symbols-outlined text-base">inbox</span>
                    Pengaduan
                </a>
                @endhasanyrole

            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-white/80 hover:bg-white/10 transition-all">
                        <span class="material-symbols-outlined text-base">logout</span>
                        Logout
                    </button>
                </form>
            </div>

        </aside>

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shrink-0">
                <h2 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500">{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
            </header>

            {{-- Konten --}}
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
</html>