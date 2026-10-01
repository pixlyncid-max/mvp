@extends('layouts.app')

@section('title', 'Tim Advokat — ' . ($settings['site_name'] ?? 'MVP Law Firm'))
@section('meta_description', $settings['meta_tim'])

@section('content')

    <!-- ═══════════════════════════════════════════════════════════════════
                                 HERO
                            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-surface pt-20 pb-24 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none"
            style="background:radial-gradient(ellipse 70% 50% at 50% 0%,rgba(184,154,114,.1),transparent)"></div>
        <div class="mx-auto max-w-container-max px-6 md:px-8 relative z-10">
            <div class="max-w-3xl">
                <h1
                    class="reveal font-headline text-5xl md:text-7xl lg:text-[88px] text-primary leading-[1.05] tracking-tight font-semibold">
                    Bertemu dengan Tim Kami
                </h1>
                <div class="w-12 h-px bg-secondary mt-8 mb-8"></div>
                <p class="reveal text-lg md:text-xl text-on-surface-variant leading-relaxed max-w-2xl">
                    Di balik setiap pendampingan hukum terdapat tim profesional yang bekerja dengan integritas, ketelitian,
                    dan komitmen terhadap kepentingan terbaik klien. Dengan pengalaman di berbagai bidang praktik, kami
                    menghadirkan solusi hukum yang disesuaikan dengan kebutuhan setiap individu maupun perusahaan.
                </p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                                 TEAM GRID
                            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-[#F9F7F8] py-section-gap">
        <div class="mx-auto max-w-container-max px-6 md:px-8">
            <!-- CATEGORY TABS NAVBAR WITH FRAMER MOTION INDICATOR -->
            <div class="team-category-nav flex justify-center items-center mb-16">
                <div class="relative inline-flex items-center gap-8 md:gap-14 border-b border-primary/10 pb-4 text-xs md:text-sm font-bold tracking-[0.2em] uppercase">
                    <button type="button" data-team-category="partner" class="team-cat-tab active text-primary transition-colors py-1 cursor-pointer">
                        PARTNER
                    </button>
                    <button type="button" data-team-category="associate" class="team-cat-tab text-primary/40 hover:text-primary transition-colors py-1 cursor-pointer">
                        ASSOCIATE
                    </button>
                    <button type="button" data-team-category="support" class="team-cat-tab text-primary/40 hover:text-primary transition-colors py-1 cursor-pointer">
                        SUPPORT
                    </button>
                    <!-- FRAMER MOTION ACTIVE SLIDING INDICATOR BAR -->
                    <span class="team-cat-indicator absolute bottom-0 h-[2px] bg-secondary pointer-events-none rounded-full"></span>
                </div>
            </div>

            <div class="team-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 min-h-[400px]">
                @foreach($team as $m)
                    <div class="team-card-item transition-all duration-300" data-category="{{ $m->category_slug }}">
                        <a href="{{ route('tim.detail', $m->slug ?: $m->id) }}" class="block group h-full">
                            <article
                                class="reveal h-full rounded-[32px] bg-white border border-primary/5 overflow-hidden grad-border hover:shadow-2xl hover:shadow-primary/10 transition-all duration-500 flex flex-col justify-between cursor-pointer">
                                <div>
                                    <div class="aspect-[4/5] overflow-hidden relative bg-gray-100">
                                        <img alt="{{ $m->name }}"
                                            class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                                            src="{{ $m->photo_url }}">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-primary/70 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div>

                                        @if($m->expertise && count($m->expertise) > 0)
                                            <div
                                                class="absolute bottom-0 left-0 right-0 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500 z-10">
                                                <ul class="space-y-1.5">
                                                    @foreach($m->expertise as $e)
                                                        @if(trim($e) !== '')
                                                            <li
                                                                class="text-xs font-bold text-secondary uppercase tracking-widest flex items-center gap-2">
                                                                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span> {{ $e }}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-8">
                                        <span class="text-xs font-bold text-secondary uppercase tracking-widest">{{ $m->role }}</span>
                                        <h2 class="font-headline text-xl text-primary mt-1 mb-1 font-semibold group-hover:text-secondary transition-colors">{{ $m->name }}</h2>
                                        <p class="text-sm text-on-surface-variant mb-0">{{ $m->specialty }}</p>
                                    </div>
                                </div>
                                
                                <div class="px-8 pb-8 pt-0 flex items-center justify-between text-xs font-bold uppercase tracking-wider text-primary/60 group-hover:text-secondary transition-colors border-t border-transparent group-hover:border-primary/5">
                                    <span>Lihat Profil Lengkap</span>
                                    <iconify-icon icon="solar:arrow-right-linear" class="text-base transition-transform group-hover:translate-x-1"></iconify-icon>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                                 PROFESSIONAL ETHOS
                            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-primary py-section-gap relative overflow-hidden">
        <div class="parallax absolute inset-0 opacity-20"
            style="background:radial-gradient(ellipse 50% 60% at 80% 50%,rgba(184,154,114,.3),transparent);filter:blur(80px)">
        </div>
        <div class="mx-auto max-w-container-max px-6 md:px-8 relative z-10 grid lg:grid-cols-2 gap-20 items-center">

            <div class="reveal space-y-10">
                <div>
                    <p class="text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">BUDAYA KERJA KAMI</p>
                    <h2 class="font-headline text-4xl md:text-5xl text-surface leading-tight font-semibold">
                        Membangun Kepercayaan Melalui Profesionalisme dan Integritas
                    </h2>
                </div>
                <p class="text-surface/70 text-lg leading-relaxed">
                    Di MVP Law Firm, kami mengutamakan integritas, profesionalisme, dan ketelitian dalam memberikan layanan
                    hukum. Melalui analisis yang mendalam, komunikasi yang transparan, dan strategi yang tepat, kami
                    berkomitmen menghadirkan solusi hukum yang efektif bagi individu maupun perusahaan dengan pendampingan
                    yang dapat dipercaya dan berorientasi pada kepentingan terbaik klien.

                </p>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <p class="font-headline text-4xl text-secondary">{{ $settings['lawyers_count'] ?? 15 }}+</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-surface/50 mt-1">Advokat Senior</p>
                    </div>
                    <div>
                        <p class="font-headline text-4xl text-secondary">200+</p>
                        <p class="text-xs font-bold uppercase tracking-widest text-surface/50 mt-1">Klien Aktif</p>
                    </div>
                </div>
            </div>

            @if($team->isNotEmpty())
                <div class="reveal hidden lg:block">
                    <div class="rounded-[32px] border border-surface/10 bg-surface/5 p-10">
                        <iconify-icon class="text-5xl text-secondary mb-6 block" icon="solar:quote-up-bold"></iconify-icon>
                        <p class="font-headline text-2xl text-surface italic leading-relaxed">
                            "Kepercayaan tidak dibangun melalui janji, tetapi melalui kualitas layanan, integritas, dan komitmen
                            dalam setiap langkah pendampingan hukum."
                        </p>
                        <div class="mt-8 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-secondary">
                                <img alt="{{ $team[0]->name }}" class="w-full h-full object-cover"
                                    src="{{ $team[0]->photo_url }}">
                            </div>
                            <div>
                                <p class="text-sm font-bold text-surface">{{ $team[0]->name }}</p>
                                <p class="text-xs text-surface/50">{{ $team[0]->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                                 JOIN CTA
                            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-[#F9F7F8] py-24">
        <div class="mx-auto max-w-container-max px-6 md:px-8 text-center">
            <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">Diskusi dengan Tim</p>
            <h2 class="reveal font-headline text-4xl md:text-6xl text-primary mb-8 font-semibold">Siap Berdiskusi dengan Tim
                Kami?</h2>
            <p class="reveal text-lg text-on-surface-variant max-w-xl mx-auto mb-12 leading-relaxed">
                Setiap persoalan hukum memerlukan pendekatan yang tepat. Tim MVP Law Firm siap mendengarkan kebutuhan Anda,
                memberikan analisis hukum yang komprehensif, serta merancang strategi yang sesuai untuk melindungi
                kepentingan pribadi maupun bisnis Anda.
            </p>
            <div class="reveal flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('kontak') }}"
                    class="bg-primary text-surface px-10 py-5 rounded-full font-bold uppercase tracking-widest btn-lift">
                    Jadwalkan Konsultasi
                </a>
                <a href="{{ route('kontak') }}"
                    class="border border-primary/10 text-primary px-10 py-5 rounded-full font-bold uppercase tracking-widest hover:bg-primary/5 transition-colors btn-lift">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

@endsection