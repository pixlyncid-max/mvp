<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — MVP Law Firm CMS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary:   '#242844',
                        secondary: '#B89A72',
                        surface:   '#FDFBFC',
                    },
                    fontFamily: {
                        headline: ['Playfair Display', 'serif'],
                        body:     ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link {
            display: flex !important;
            align-items: center !important;
            gap: 0.75rem !important;
            padding: 0.625rem 1rem !important;
            border-radius: 0.5rem !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            color: rgba(255, 255, 255, 0.7) !important;
            transition: all 0.2s !important;
        }
        .sidebar-link:hover {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
        .sidebar-link.active {
            background-color: rgba(184, 154, 114, 0.2) !important;
            color: #B89A72 !important;
        }
        .form-input {
            width: 100% !important;
            border: 1px solid #e5e7eb !important;
            border-radius: 0.75rem !important;
            padding: 0.75rem 1rem !important;
            font-size: 0.875rem !important;
            background-color: #ffffff !important;
            color: #1b1c1d !important;
            outline: none !important;
            transition: all 0.2s !important;
        }
        .form-input:focus {
            border-color: #B89A72 !important;
            box-shadow: 0 0 0 3px rgba(184, 154, 114, 0.2) !important;
        }
        .form-label {
            display: block !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            color: #6b7280 !important;
            margin-bottom: 0.5rem !important;
        }
        .btn-primary {
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            background-color: #242844 !important;
            color: #ffffff !important;
            padding: 0.625rem 1.25rem !important;
            border-radius: 0.75rem !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: background-color 0.2s !important;
            cursor: pointer !important;
        }
        .btn-primary:hover {
            background-color: rgba(36, 40, 68, 0.9) !important;
        }
        .btn-secondary {
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            border: 1px solid #e5e7eb !important;
            background-color: #ffffff !important;
            color: #374151 !important;
            padding: 0.625rem 1.25rem !important;
            border-radius: 0.75rem !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: background-color 0.2s !important;
            cursor: pointer !important;
        }
        .btn-secondary:hover {
            background-color: #f9fafb !important;
        }
        .btn-danger {
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            background-color: #fef2f2 !important;
            color: #dc2626 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 0.75rem !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: background-color 0.2s !important;
            cursor: pointer !important;
        }
        .btn-danger:hover {
            background-color: #fee2e2 !important;
        }
        .card {
            background-color: #ffffff !important;
            border-radius: 1rem !important;
            border: 1px solid #f3f4f6 !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
            padding: 1.5rem !important;
        }
    </style>
</head>
<body class="h-full bg-gray-50 font-body">

<div class="flex h-screen overflow-hidden">
    <!-- ── SIDEBAR ──────────────────────────────────────────────────── -->
    <aside class="w-64 flex-shrink-0 bg-primary flex flex-col overflow-y-auto">
        <!-- Logo -->
        <div class="px-6 py-7 border-b border-white/10">
            <p class="font-headline text-xl text-white">MVP Law Firm</p>
            <p class="text-xs text-white/40 mt-0.5 uppercase tracking-widest">Admin Panel</p>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <iconify-icon icon="solar:home-2-linear" class="text-lg"></iconify-icon>
                Dashboard
            </a>
            <p class="px-4 pt-4 pb-1 text-[10px] font-bold uppercase tracking-widest text-white/30">Konten</p>
            <a href="{{ route('admin.services.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <iconify-icon icon="solar:balance-linear" class="text-lg"></iconify-icon>
                Layanan
            </a>
            <a href="{{ route('admin.team.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                <iconify-icon icon="solar:users-group-rounded-linear" class="text-lg"></iconify-icon>
                Tim Advokat
            </a>
            <a href="{{ route('admin.testimonials.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                <iconify-icon icon="solar:chat-round-line-linear" class="text-lg"></iconify-icon>
                Testimonial
            </a>
            <a href="{{ route('admin.milestones.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.milestones*') ? 'active' : '' }}">
                <iconify-icon icon="solar:timeline-linear" class="text-lg"></iconify-icon>
                Milestone
            </a>
            <a href="{{ route('admin.pages.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                <iconify-icon icon="solar:document-text-linear" class="text-lg"></iconify-icon>
                Konten Halaman
            </a>
            <p class="px-4 pt-4 pb-1 text-[10px] font-bold uppercase tracking-widest text-white/30">Sistem</p>
            <a href="{{ route('admin.settings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <iconify-icon icon="solar:settings-linear" class="text-lg"></iconify-icon>
                Pengaturan
            </a>
        </nav>

        <!-- User info + logout -->
        <div class="px-4 py-5 border-t border-white/10">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-full bg-secondary/30 flex items-center justify-center text-secondary font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name ?? '' }}</p>
                    <p class="text-xs text-white/40 truncate">{{ auth()->user()->email ?? '' }}</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left sidebar-link text-red-400 hover:text-red-300">
                    <iconify-icon icon="solar:logout-linear" class="text-lg"></iconify-icon>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- ── MAIN CONTENT ──────────────────────────────────────────────── -->
    <main class="flex-1 flex flex-col overflow-hidden">
        <!-- Top bar -->
        <header class="bg-white border-b border-gray-100 px-8 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-bold text-primary">@yield('page_title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400 mt-0.5">@yield('page_subtitle', 'Selamat datang di admin panel MVP Law Firm')</p>
            </div>
            <a href="{{ url('/') }}" target="_blank"
               class="flex items-center gap-2 text-xs text-gray-400 hover:text-secondary transition-colors">
                <iconify-icon icon="solar:eye-linear"></iconify-icon>
                Lihat Website
            </a>
        </header>

        <!-- Flash messages -->
        <div class="px-8 pt-4 flex-shrink-0">
            @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-3 text-sm mb-0">
                <iconify-icon icon="solar:check-circle-linear" class="text-lg flex-shrink-0"></iconify-icon>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-600 rounded-xl px-5 py-3 text-sm mb-0">
                <iconify-icon icon="solar:danger-triangle-linear" class="text-lg flex-shrink-0"></iconify-icon>
                {{ session('error') }}
            </div>
            @endif
        </div>

        <!-- Page content -->
        <div class="flex-1 overflow-y-auto px-8 py-6">
            @yield('content')
        </div>
    </main>
</div>

@yield('scripts')
</body>
</html>
