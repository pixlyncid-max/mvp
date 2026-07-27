<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'MVP Law Firm — Melindungi Hak Anda dengan Integritas')</title>
    <meta name="description" content="@yield('meta_description', 'MVP Law Firm menyediakan layanan hukum profesional dengan integritas tinggi untuk kebutuhan pribadi dan korporasi di Indonesia.')">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary":              "#242844",
                        "secondary":            "#B89A72",
                        "surface":              "#FDFBFC",
                        "on-surface":           "#1b1c1d",
                        "on-surface-variant":   "#46464d",
                        "outline-variant":      "#c7c5ce",
                    },
                    fontFamily: {
                        "headline": ["Playfair Display", "serif"],
                        "body":     ["Inter", "sans-serif"]
                    },
                    spacing: {
                        "section-gap":    "120px",
                        "container-max":  "1200px"
                    }
                }
            }
        }
    </script>
    <style>
        /* ── Animations ────────────────────────────────────────── */
        .w-anim {
            display: inline-block;
            opacity: 0;
            filter: blur(8px);
            transform: translateY(16px);
            animation: wordIn .8s cubic-bezier(.22,1,.36,1) forwards;
        }
        @keyframes wordIn {
            to { opacity: 1; filter: blur(0); transform: translateY(0); }
        }

        /* ── Gradient border card ──────────────────────────────── */
        .grad-border {
            border: 1px solid transparent !important;
            background-image:
                linear-gradient(#FDFBFC,#FDFBFC),
                linear-gradient(135deg, rgba(184,154,114,.5), rgba(36,40,68,.2), rgba(184,154,114,.3)) !important;
            background-origin: border-box !important;
            background-clip: padding-box, border-box !important;
        }

        /* ── Hover-lift button ─────────────────────────────────── */
        .btn-lift {
            transition: transform .35s cubic-bezier(.22,1,.36,1),
                        box-shadow .35s ease,
                        background-color .3s ease,
                        color .3s ease;
            will-change: transform;
        }
        .btn-lift:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 16px 32px -14px rgba(36,40,68,.25);
        }
        .btn-lift:active { transform: translateY(0) scale(.96); }

        /* ── Parallax helper ──────────────────────────────────── */
        .parallax { will-change: transform; }

        /* ── Active nav link ──────────────────────────────────── */
        nav a.active { color: #B89A72 !important; }

        @media (prefers-reduced-motion: reduce) {
            .w-anim { animation: none; opacity: 1; filter: none; transform: none; }
        }
    </style>
    @yield('head')
</head>
<body class="bg-surface text-on-surface font-body antialiased selection:bg-secondary selection:text-white">

<!-- ═══════════════════════════════════════════════════════════════════
     HEADER
══════════════════════════════════════════════════════════════════════ -->
<header id="site-header" class="sticky top-0 z-50 transition-all duration-500 bg-transparent">
    <nav class="mx-auto max-w-container-max px-6 md:px-8 h-20 flex items-center justify-between">

        <!-- Logo -->
        <a class="flex items-center" href="{{ url('/') }}">
            <img alt="MVP Law Firm" class="h-10"
                 src="{{ asset('images/primary-horizontal.png') }}">
        </a>

        <!-- Desktop nav -->
        <div class="hidden md:flex items-center gap-10 text-sm font-medium tracking-wide uppercase text-primary/70">
            <a class="hover:text-secondary transition-colors {{ request()->is('/') ? 'text-secondary' : '' }}"
               href="{{ url('/') }}">Beranda</a>
            <a class="hover:text-secondary transition-colors {{ request()->is('layanan') ? 'text-secondary' : '' }}"
               href="{{ route('layanan') }}">Layanan</a>
            <a class="hover:text-secondary transition-colors {{ request()->is('tentang') ? 'text-secondary' : '' }}"
               href="{{ route('tentang') }}">Tentang</a>
            <a class="hover:text-secondary transition-colors {{ request()->is('tim') ? 'text-secondary' : '' }}"
               href="{{ route('tim') }}">Tim</a>
            <a class="hover:text-secondary transition-colors {{ request()->is('kontak') ? 'text-secondary' : '' }}"
               href="{{ route('kontak') }}">Kontak</a>
        </div>

        <!-- CTA + Mobile Hamburger -->
        <div class="flex items-center gap-4">
            <a href="{{ route('kontak') }}"
               class="bg-primary text-surface px-7 py-3 rounded-full text-xs font-bold uppercase tracking-widest transition-all btn-lift">
                Konsultasi
            </a>
            <!-- Hamburger -->
            <button id="mobileMenuBtn" class="md:hidden p-2 text-primary" aria-label="Menu">
                <iconify-icon icon="solar:hamburger-menu-linear" class="text-2xl"></iconify-icon>
            </button>
        </div>
    </nav>

    <!-- Mobile nav drawer -->
    <div id="mobileMenu" class="hidden md:hidden bg-surface border-t border-primary/5 px-6 py-6 space-y-4">
        <a class="block text-sm font-medium uppercase tracking-widest text-primary/70 hover:text-secondary transition-colors"
           href="{{ url('/') }}">Beranda</a>
        <a class="block text-sm font-medium uppercase tracking-widest text-primary/70 hover:text-secondary transition-colors"
           href="{{ route('layanan') }}">Layanan</a>
        <a class="block text-sm font-medium uppercase tracking-widest text-primary/70 hover:text-secondary transition-colors"
           href="{{ route('tentang') }}">Tentang</a>
        <a class="block text-sm font-medium uppercase tracking-widest text-primary/70 hover:text-secondary transition-colors"
           href="{{ route('tim') }}">Tim</a>
        <a class="block text-sm font-medium uppercase tracking-widest text-primary/70 hover:text-secondary transition-colors"
           href="{{ route('kontak') }}">Kontak</a>
    </div>
</header>

<!-- ═══════════════════════════════════════════════════════════════════
     MAIN CONTENT
══════════════════════════════════════════════════════════════════════ -->
<main>
    @yield('content')
</main>

<!-- ═══════════════════════════════════════════════════════════════════
     FOOTER
══════════════════════════════════════════════════════════════════════ -->
<footer class="relative overflow-hidden" style="background-color: #B89A72;">
    <div class="mx-auto max-w-container-max px-6 md:px-8 pt-32 pb-12 relative z-10 text-center text-surface">
        <h2 class="font-headline text-5xl md:text-7xl lg:text-8xl leading-tight mb-12 text-surface">
            Butuh Bantuan Hukum?
        </h2>
        <a href="{{ route('kontak') }}"
           class="inline-block bg-primary text-surface px-12 py-6 rounded-full font-bold uppercase tracking-widest mb-32 btn-lift">
            Mulai Konsultasi
        </a>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-left pt-20 border-t border-primary/10">
            <!-- Brand -->
            <div class="col-span-2 md:col-span-1">
                <img alt="MVP Law Firm" class="h-12 mb-6"
                     src="{{ asset('images/primary-horizontal.png') }}"
                     style="filter: brightness(0) invert(1);">
                <p class="text-sm leading-relaxed text-surface/80">
                    Menyediakan standar keunggulan hukum di Indonesia dengan fokus pada integritas, keahlian, dan hasil yang maksimal.
                </p>
            </div>

            <!-- Navigasi -->
            <nav>
                <p class="text-xs font-bold uppercase tracking-widest mb-6 text-surface/60">Navigasi</p>
                <ul class="space-y-4 text-sm font-medium text-surface">
                    <li><a class="hover:text-primary transition-colors" href="{{ url('/') }}">Beranda</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('layanan') }}">Layanan</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('tentang') }}">Tentang</a></li>
                    <li><a class="hover:text-primary transition-colors" href="{{ route('tim') }}">Tim</a></li>
                </ul>
            </nav>

            <!-- Legal -->
            <nav>
                <p class="text-xs font-bold uppercase tracking-widest mb-6 text-surface/60">Legal</p>
                <ul class="space-y-4 text-sm font-medium text-surface">
                    <li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Disclaimer</a></li>
                </ul>
            </nav>

            <!-- Sosial -->
            <div>
                <p class="text-xs font-bold uppercase tracking-widest mb-6 text-surface/60">Sosial</p>
                <div class="flex gap-4">
                    @if(!empty($settings['social_instagram']) && $settings['social_instagram'] !== '#')
                    <a class="w-10 h-10 rounded-full border flex items-center justify-center hover:border-primary hover:text-primary transition-colors text-surface border-white/20" href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener noreferrer">
                        <iconify-icon icon="ri:instagram-line"></iconify-icon>
                    </a>
                    @endif
                    @if(!empty($settings['social_tiktok']) && $settings['social_tiktok'] !== '#')
                    <a class="w-10 h-10 rounded-full border flex items-center justify-center hover:border-primary hover:text-primary transition-colors text-surface border-white/20" href="{{ $settings['social_tiktok'] }}" target="_blank" rel="noopener noreferrer">
                        <iconify-icon icon="ri:tiktok-line"></iconify-icon>
                    </a>
                    @endif
                    @if(!empty($settings['social_facebook']) && $settings['social_facebook'] !== '#')
                    <a class="w-10 h-10 rounded-full border flex items-center justify-center hover:border-primary hover:text-primary transition-colors text-surface border-white/20" href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener noreferrer">
                        <iconify-icon icon="ri:facebook-line"></iconify-icon>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-20 pt-8 border-t border-primary/5 flex flex-col md:flex-row justify-between items-center text-xs font-bold uppercase tracking-widest text-surface/60">
            <p>© 2024 MVP Law Firm. All rights reserved.</p>
            <p>Designed with Integritas</p>
        </div>
    </div>
</footer>

<!-- ═══════════════════════════════════════════════════════════════════
     GLOBAL SCRIPTS
══════════════════════════════════════════════════════════════════════ -->
<script>
    // ── Accordion / FAQ (drives Framer Motion MutationObserver in animations.js) ──
    document.querySelectorAll('.faq-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const isOpen = btn.getAttribute('aria-expanded') === 'true';
            // Close all first
            document.querySelectorAll('.faq-btn').forEach(b => {
                b.setAttribute('aria-expanded', 'false');
                if (b.nextElementSibling) b.nextElementSibling.style.maxHeight = '0';
            });
            // Toggle clicked
            if (!isOpen) {
                btn.setAttribute('aria-expanded', 'true');
                const body = btn.nextElementSibling;
                if (body) body.style.maxHeight = body.scrollHeight + 'px';
            }
        });
    });

    // ── Smooth Scroll ─────────────────────────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
        });
    });

    // ── Mobile menu ───────────────────────────────────────────────────
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu    = document.getElementById('mobileMenu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    }
</script>

@yield('scripts')

</body>
</html>
