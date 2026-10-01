@extends('layouts.app')

@section('title', 'Layanan Hukum — ' . ($settings['site_name'] ?? 'MVP Law Firm'))
@section('meta_description', $settings['meta_layanan'])

@section('content')

    <!-- ═══════════════════════════════════════════════════════════════════
                                                     HERO
                                                ══════════════════════════════════════════════════════════════════════ -->
    <section class="relative bg-surface overflow-hidden pt-20 pb-32">
        <div class="absolute inset-0 pointer-events-none"
            style="background:radial-gradient(ellipse 80% 50% at 50% 100%,rgba(184,154,114,.12),transparent)"></div>
        <div class="mx-auto max-w-container-max px-6 md:px-8 flex flex-col items-center text-center relative z-10">
            <h1
                class="reveal font-headline text-5xl md:text-7xl lg:text-[88px] text-primary leading-[1.05] tracking-tight max-w-4xl font-semibold">
                Bidang Praktik Kami
            </h1>
            <div class="w-12 h-px bg-secondary mt-8 mb-8"></div>
            <p class="reveal text-lg md:text-xl text-on-surface-variant max-w-2xl leading-relaxed">
                Memberikan layanan hukum yang komprehensif bagi individu, perusahaan, dan investor melalui pendekatan yang
                strategis, profesional, serta berorientasi pada solusi. Kami mendampingi setiap klien dengan komitmen untuk
                melindungi kepentingan hukum dan mendukung keberlanjutan tujuan bisnis mereka.
            </p>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                                                     SERVICES GRID
                                                ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-[#F6F3F4] py-section-gap">
        <div class="mx-auto max-w-container-max px-6 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $s)
                    <article
                        class="reveal group bg-white rounded-[28px] border border-primary/5 grad-border p-10 hover:shadow-2xl hover:shadow-primary/8 transition-all duration-500 flex flex-col">
                        <div class="w-14 h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary mb-8">
                            <iconify-icon class="text-3xl" icon="{{ $s->icon }}"></iconify-icon>
                        </div>
                        <h2 class="font-headline text-2xl text-primary mb-3 font-semibold">{{ $s->title }}</h2>
                        <p class="text-on-surface-variant text-sm leading-relaxed mb-8">{{ $s->description }}</p>

                        @if($s->items)
                            <ul class="space-y-3 mb-10 flex-1">
                                @foreach($s->items as $item)
                                    <li class="flex items-center gap-3 text-sm text-on-surface-variant">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary flex-shrink-0"></span>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <a class="text-xs font-bold uppercase tracking-widest text-secondary flex items-center gap-2 group/link mt-auto"
                            href="{{ route('kontak') }}">
                            Konsultasi Sekarang
                            <iconify-icon class="group-hover/link:translate-x-1 transition-transform"
                                icon="solar:arrow-right-linear"></iconify-icon>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                                                     PROCESS SECTION
                                                ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-surface py-section-gap">
        <div class="mx-auto max-w-container-max px-6 md:px-8">
            <div class="text-center mb-20">
                <h2 class="reveal font-headline text-4xl md:text-6xl text-primary font-semibold">Pendampingan Hukum dalam
                    Empat Tahap</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @php
                    $steps = [
                        ['num' => '01', 'icon' => 'solar:phone-calling-linear', 'title' => 'Konsultasi Awal', 'desc' => 'Kami memulai dengan memahami kebutuhan, tujuan, dan permasalahan hukum yang Anda hadapi. Pada tahap ini, kami mengidentifikasi isu hukum utama serta memberikan gambaran awal mengenai langkah yang dapat ditempuh.'],
                        ['num' => '02', 'icon' => 'solar:document-text-linear', 'title' => 'Analisis Hukum', 'desc' => 'Tim kami melakukan kajian menyeluruh terhadap dokumen, fakta, dan ketentuan hukum yang relevan. Hasil analisis ini menjadi dasar dalam menentukan strategi hukum yang paling tepat.'],
                        ['num' => '03', 'icon' => 'solar:users-group-rounded-linear', 'title' => 'Penyusunan Strategi', 'desc' => 'Berdasarkan hasil analisis, kami menyusun strategi hukum yang disesuaikan dengan kepentingan dan tujuan klien. Setiap rekomendasi mempertimbangkan aspek hukum, bisnis, serta efektivitas penyelesaian.'],
                        ['num' => '04', 'icon' => 'solar:shield-check-linear', 'title' => 'Pendampingan & Hasil', 'desc' => 'Kami melaksanakan strategi yang telah disusun melalui negosiasi, mediasi, penyusunan dokumen hukum, maupun proses litigasi apabila diperlukan. Selama proses berlangsung, kami menjaga komunikasi yang transparan hingga perkara atau kebutuhan hukum terselesaikan.'],
                    ];
                @endphp
                @foreach($steps as $i => $step)
                    <div class="reveal text-center relative">
                        @if($i < 3)
                            <div
                                class="hidden md:block absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-4rem)] h-px bg-secondary/20">
                            </div>
                        @endif
                        <div
                            class="relative inline-flex w-16 h-16 rounded-full border-2 border-secondary/30 items-center justify-center mb-6 bg-surface">
                            <iconify-icon class="text-2xl text-secondary" icon="{{ $step['icon'] }}"></iconify-icon>
                            <span
                                class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-secondary text-surface text-xs font-bold flex items-center justify-center">{{ $i + 1 }}</span>
                        </div>
                        <h3 class="font-headline text-xl text-primary mb-3 font-semibold">{{ $step['title'] }}</h3>
                        <p class="text-sm text-on-surface-variant leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                                                     CTA BANNER
                                                ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-primary py-24 relative overflow-hidden">
        <div class="parallax absolute inset-0 opacity-20"
            style="background:radial-gradient(ellipse 60% 60% at 80% 50%,rgba(184,154,114,.4),transparent);filter:blur(80px)">
        </div>
        <div class="mx-auto max-w-container-max px-6 md:px-8 relative z-10 grid lg:grid-cols-2 gap-12 items-center">
            <div class="reveal">
                <h2 class="font-headline text-4xl md:text-6xl text-surface leading-tight font-semibold">
                    Konsultasikan Kebutuhan Hukum Anda Bersama Kami
                </h2>
                <p class="mt-6 text-surface/70 text-lg leading-relaxed">
                    Setiap persoalan hukum memerlukan strategi yang tepat dan pendampingan yang profesional. Tim MVP Law
                    Firm siap membantu Anda melalui konsultasi, analisis hukum, hingga penyelesaian perkara dengan
                    pendekatan yang berorientasi pada solusi dan kepentingan terbaik Anda.
                </p>
            </div>
            <div class="reveal flex flex-col sm:flex-row gap-4 lg:justify-end">
                <a href="{{ route('kontak') }}"
                    class="bg-secondary text-surface px-10 py-5 rounded-full font-bold uppercase tracking-widest btn-lift text-center">
                    Jadwalkan Pertemuan
                </a>
                <a href="{{ route('tim') }}"
                    class="border border-surface/20 text-surface px-10 py-5 rounded-full font-bold uppercase tracking-widest hover:bg-surface/5 transition-colors btn-lift text-center">
                    Kenali Tim Kami
                </a>
            </div>
        </div>
    </section>

@endsection