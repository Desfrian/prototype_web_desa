<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Desa Amanah') - Harmoni Alam & Kearifan Lokal</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary":                  "#012d1d",
                        "primary-container":        "#1b4332",
                        "primary-fixed":            "#c1ecd4",
                        "primary-fixed-dim":        "#a5d0b9",
                        "on-primary":               "#ffffff",
                        "on-primary-fixed":         "#002114",
                        "on-primary-fixed-variant": "#274e3d",
                        "on-primary-container":     "#86af99",
                        "secondary":                "#a7373b",
                        "secondary-container":      "#ff7a7a",
                        "secondary-fixed":          "#ffdad8",
                        "secondary-fixed-dim":      "#ffb3b0",
                        "on-secondary":             "#ffffff",
                        "on-secondary-fixed":       "#410007",
                        "on-secondary-container":   "#74101a",
                        "tertiary":                 "#002d1c",
                        "tertiary-container":       "#00452e",
                        "tertiary-fixed":           "#b1f0ce",
                        "tertiary-fixed-dim":       "#95d4b3",
                        "on-tertiary":              "#ffffff",
                        "on-tertiary-fixed":        "#002114",
                        "on-tertiary-fixed-variant":"#0e5138",
                        "on-tertiary-container":    "#75b393",
                        "background":               "#f8f9fa",
                        "surface":                  "#f8f9fa",
                        "surface-dim":              "#d9dadb",
                        "surface-bright":           "#f8f9fa",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low":    "#f3f4f5",
                        "surface-container":        "#edeeef",
                        "surface-container-high":   "#e7e8e9",
                        "surface-container-highest":"#e1e3e4",
                        "surface-variant":          "#e1e3e4",
                        "surface-tint":             "#3f6653",
                        "on-surface":               "#191c1d",
                        "on-surface-variant":       "#414844",
                        "on-background":            "#191c1d",
                        "outline":                  "#717973",
                        "outline-variant":          "#c1c8c2",
                        "inverse-primary":          "#a5d0b9",
                        "inverse-surface":          "#2e3132",
                        "inverse-on-surface":       "#f0f1f2",
                        "error":                    "#ba1a1a",
                        "error-container":          "#ffdad6",
                        "on-error":                 "#ffffff",
                        "on-error-container":       "#93000a",
                    },
                    spacing: {
                        "xs":            "4px",
                        "sm":            "12px",
                        "md":            "24px",
                        "lg":            "48px",
                        "xl":            "80px",
                        "gutter":        "24px",
                        "container-max": "1200px",
                        "base":          "8px",
                    },
                    fontFamily: {
                        "display-lg":  ["Merriweather"],
                        "headline-md": ["Merriweather"],
                        "body-lg":     ["Inter"],
                        "body-md":     ["Inter"],
                        "title-lg":    ["Inter"],
                        "label-md":    ["Inter"],
                        "caption":     ["Inter"],
                    },
                    fontSize: {
                        "display-lg":        ["48px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "display-lg-mobile": ["32px", { lineHeight: "1.25", fontWeight: "700" }],
                        "headline-md":       ["32px", { lineHeight: "1.3", fontWeight: "700" }],
                        "headline-md-mobile":["24px", { lineHeight: "1.3", fontWeight: "700" }],
                        "title-lg":          ["20px", { lineHeight: "1.5", fontWeight: "600" }],
                        "body-lg":           ["18px", { lineHeight: "1.6", fontWeight: "400" }],
                        "body-md":           ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                        "label-md":          ["14px", { lineHeight: "1.4", letterSpacing: "0.01em", fontWeight: "500" }],
                        "caption":           ["12px", { lineHeight: "1.4", fontWeight: "400" }],
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg:      "0.5rem",
                        xl:      "0.75rem",
                        full:    "9999px",
                    },
                }
            }
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .hero-overlay {
            background: linear-gradient(to bottom, rgba(1,45,29,0.7), rgba(1,45,29,0.4));
        }
        .glass-card {
            background: rgba(255,255,255,0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.3);
        }
        .bento-item { transition: all 0.3s cubic-bezier(0.4,0,0.2,1); }
        .bento-item:hover { transform: translateY(-4px); }
    </style>

    @stack('styles')
</head>
<body class="bg-background text-on-surface font-body-md overflow-x-hidden">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- FAB Button WhatsApp --}}
    @include('components.fab-button')

    {{-- Script navbar scroll effect --}}
    <script>
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (header) {
                header.classList.toggle('shadow-md', window.scrollY > 50);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>