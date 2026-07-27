@extends('layouts.app')

@section('title', $settings['site_name'] . ' — ' . $settings['site_tagline'])
@section('meta_description', $settings['meta_home'])

@section('content')

<!-- ═══════════════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden pt-16 md:pt-28 bg-surface">
    <div class="mx-auto max-w-container-max px-6 md:px-8 text-center relative z-10">

        <p class="reveal hero-eyebrow text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-6">
            {{ $content['hero']['eyebrow'] ?? 'Integritas & Keahlian' }}
        </p>

        <h1 class="reveal font-headline tracking-tight leading-[1.1]" style="font-weight:600">
            <span class="block text-5xl md:text-7xl lg:text-8xl text-primary">
                <span class="w-anim" style="animation-delay:0ms">{{ $content['hero']['headline_1'] ?? 'Kemitraan Hukum' }}</span>
            </span>
            <span class="block text-5xl md:text-7xl lg:text-8xl text-primary">
                <span class="w-anim" style="animation-delay:200ms">{{ $content['hero']['headline_2'] ?? 'yang Berlandaskan' }}</span>
            </span>
            <span class="block text-5xl md:text-7xl lg:text-8xl italic text-secondary">
                <span class="w-anim" style="animation-delay:400ms">{{ $content['hero']['headline_3'] ?? 'Kepercayaan' }}</span>
            </span>
        </h1>

        <p class="reveal mx-auto mt-8 max-w-2xl text-lg md:text-xl text-on-surface-variant leading-relaxed">
            {{ $content['hero']['subheadline'] ?? '' }}
        </p>

        <div class="reveal mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('kontak') }}"
               class="hero-cta bg-secondary text-surface px-10 py-5 rounded-full font-bold uppercase tracking-widest btn-lift">
                {{ $content['hero']['btn_primary'] ?? 'Konsultasi Sekarang' }}
            </a>
            <a href="{{ route('layanan') }}"
               class="hero-cta border border-primary/10 px-10 py-5 rounded-full font-bold uppercase tracking-widest text-primary hover:bg-primary/5 transition-colors btn-lift">
                {{ $content['hero']['btn_secondary'] ?? 'Lihat Layanan' }}
            </a>
        </div>
    </div>

    <!-- Atmospheric Visual -->
    <div class="relative mt-20 md:mt-32">
        <div class="absolute inset-x-0 bottom-0 h-[70%]"
             style="background:linear-gradient(180deg,rgba(253,251,252,0) 0%,rgba(184,154,114,.15) 30%,rgba(36,40,68,.2) 100%)">
            <div class="parallax absolute inset-0 opacity-40"
                 style="background:radial-gradient(ellipse 60% 50% at 20% 80%,rgba(184,154,114,.4),transparent),radial-gradient(ellipse 50% 40% at 80% 90%,rgba(36,40,68,.3),transparent);filter:blur(60px)"></div>
        </div>

        <div class="relative mx-auto max-w-[1100px] px-6 md:px-8 pb-24">
            <div class="hero-mockup reveal rounded-[32px] p-2 md:p-3 bg-white/40 backdrop-blur-2xl border border-white/70 shadow-[0_40px_80px_-30px_rgba(36,40,68,0.25)]">
                <div class="rounded-[24px] overflow-hidden bg-surface flex aspect-[16/9]">

                    <!-- Sidebar Mockup -->
                    <aside class="hidden md:flex w-52 flex-col border-r border-primary/5 bg-[#F9F7F8] p-6 gap-2">
                        <p class="font-headline font-bold text-primary mb-6">MVP Process.</p>
                        <div class="space-y-1">
                            <div class="flex items-center gap-3 rounded-xl px-4 py-3 bg-primary text-surface text-xs font-bold">
                                <iconify-icon icon="solar:shield-check-linear"></iconify-icon> Konsultasi
                            </div>
                            <div class="flex items-center gap-3 rounded-xl px-4 py-3 text-on-surface-variant text-xs hover:bg-primary/5">
                                <iconify-icon icon="solar:document-text-linear"></iconify-icon> Analisis Kasus
                            </div>
                            <div class="flex items-center gap-3 rounded-xl px-4 py-3 text-on-surface-variant text-xs hover:bg-primary/5">
                                <iconify-icon icon="solar:users-group-rounded-linear"></iconify-icon> Strategi Tim
                            </div>
                            <div class="flex items-center gap-3 rounded-xl px-4 py-3 text-on-surface-variant text-xs hover:bg-primary/5">
                                <iconify-icon icon="solar:gavel-linear"></iconify-icon> Litigasi
                            </div>
                        </div>
                    </aside>

                    <!-- Content Mockup -->
                    <div class="flex-1 p-8 md:p-10">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h4 class="text-xl font-bold text-primary">Dashboard Klien</h4>
                                <p class="text-sm text-on-surface-variant">Update terkini kasus hukum Anda</p>
                            </div>
                            <span class="rounded-full bg-secondary/15 text-secondary text-xs font-bold px-4 py-2">{{ $settings['mockup_badge'] ?? 'Sedang Berjalan' }}</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="rounded-2xl border border-primary/5 bg-white/50 p-6">
                                <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-4">Status Dokumen</p>
                                <div class="space-y-3">
                                    @if(!empty($settings['mockup_doc_1']))
                                    <div class="flex items-center gap-3 text-sm">
                                        <iconify-icon class="text-secondary" icon="solar:check-circle-bold"></iconify-icon> {{ $settings['mockup_doc_1'] }}
                                    </div>
                                    @endif
                                    @if(!empty($settings['mockup_doc_2']))
                                    <div class="flex items-center gap-3 text-sm">
                                        <iconify-icon class="text-secondary" icon="solar:check-circle-bold"></iconify-icon> {{ $settings['mockup_doc_2'] }}
                                    </div>
                                    @endif
                                    @if(!empty($settings['mockup_doc_3']))
                                    <div class="flex items-center gap-3 text-sm opacity-50">
                                        <iconify-icon icon="solar:refresh-linear"></iconify-icon> {{ $settings['mockup_doc_3'] }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="rounded-2xl border border-primary/5 bg-white/50 p-6 flex flex-col justify-between">
                                <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Jadwal Sidang</p>
                                <div class="mt-4">
                                    <p class="text-3xl font-headline text-primary">{{ $settings['mockup_hearing_date'] ?? '-' }}</p>
                                    <p class="text-xs text-on-surface-variant mt-1">{{ $settings['mockup_hearing_location'] ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     STATS STRIP
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-primary py-16">
    <div class="mx-auto max-w-container-max px-6 md:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="reveal">
                <p class="font-headline text-4xl md:text-5xl text-secondary" data-count="{{ $settings['years_experience'] ?? 20 }}" data-suffix="+">0</p>
                <p class="text-xs font-bold uppercase tracking-widest text-surface/60 mt-2">Tahun Pengalaman</p>
            </div>
            <div class="reveal">
                <p class="font-headline text-4xl md:text-5xl text-secondary" data-count="{{ $settings['cases_completed'] ?? 500 }}" data-suffix="+">0</p>
                <p class="text-xs font-bold uppercase tracking-widest text-surface/60 mt-2">Kasus Selesai</p>
            </div>
            <div class="reveal">
                <p class="font-headline text-4xl md:text-5xl text-secondary" data-count="{{ $settings['client_satisfaction'] ?? 98 }}" data-suffix="%">0</p>
                <p class="text-xs font-bold uppercase tracking-widest text-surface/60 mt-2">Kepuasan Klien</p>
            </div>
            <div class="reveal">
                <p class="font-headline text-4xl md:text-5xl text-secondary" data-count="{{ $settings['lawyers_count'] ?? 15 }}" data-suffix="+">0</p>
                <p class="text-xs font-bold uppercase tracking-widest text-surface/60 mt-2">Advokat Profesional</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     SERVICES CAROUSEL
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-[#F6F3F4] py-section-gap overflow-hidden" id="layanan">
    <div class="mx-auto max-w-container-max px-6 md:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="max-w-2xl">
                <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">{{ $content['services']['eyebrow'] ?? 'Keahlian Kami' }}</p>
                <h2 class="reveal font-headline text-4xl md:text-6xl text-primary leading-tight">{{ $content['services']['headline'] ?? 'Layanan Hukum Profesional' }}</h2>
            </div>
            <div class="flex gap-3">
                <button class="w-12 h-12 rounded-full border border-primary/10 flex items-center justify-center hover:bg-white transition-colors btn-lift" id="carPrev">
                    <iconify-icon class="text-xl" icon="solar:alt-arrow-left-linear"></iconify-icon>
                </button>
                <button class="w-12 h-12 rounded-full border border-primary/10 flex items-center justify-center hover:bg-white transition-colors btn-lift" id="carNext">
                    <iconify-icon class="text-xl" icon="solar:alt-arrow-right-linear"></iconify-icon>
                </button>
            </div>
        </div>

        <div class="mt-16 flex gap-6 overflow-x-auto snap-x snap-mandatory pb-12" id="carousel"
             style="scrollbar-width:none;-ms-overflow-style:none">

            @foreach($services as $s)
            <div class="snap-start shrink-0 w-[85vw] md:w-[350px] rounded-[28px] bg-white p-10 border border-primary/5 grad-border shadow-xl shadow-primary/5">
                <div class="w-14 h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary mb-8">
                    <iconify-icon class="text-3xl" icon="{{ $s->icon }}"></iconify-icon>
                </div>
                <h3 class="font-headline text-2xl text-primary mb-4">{{ $s->title }}</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed mb-8">{{ $s->description }}</p>
                <a class="text-xs font-bold uppercase tracking-widest text-secondary flex items-center gap-2 group" href="{{ route('layanan') }}">
                    Detail Layanan <iconify-icon class="group-hover:translate-x-1 transition-transform" icon="solar:arrow-right-linear"></iconify-icon>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     ABOUT (SNIPPET)
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-surface py-section-gap" id="tentang">
    <div class="mx-auto max-w-container-max px-6 md:px-8 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

        <div class="reveal relative">
            <div class="rounded-[40px] overflow-hidden aspect-[4/5] shadow-2xl shadow-primary/10">
                <img alt="Tim MVP Law Firm" class="w-full h-full object-cover grayscale-[30%] hover:grayscale-0 transition-all duration-1000"
                     src="{{ asset('images/law1.png') }}">
            </div>
            <div class="absolute -bottom-10 -right-10 bg-primary p-10 rounded-3xl hidden md:block">
                <p class="text-4xl font-headline text-secondary" data-count="{{ $settings['years_experience'] ?? 20 }}" data-suffix="+">0</p>
                <p class="text-xs font-bold text-surface/60 uppercase tracking-widest mt-2">Tahun Pengalaman</p>
            </div>
        </div>

        <div class="space-y-10">
            <div>
                <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">{{ $content['about']['eyebrow'] ?? 'Tentang Kami' }}</p>
                <h2 class="reveal font-headline text-4xl md:text-5xl lg:text-6xl text-primary leading-tight font-semibold">
                    {{ $content['about']['headline'] ?? 'Melindungi Hak Anda dengan Integritas' }}
                </h2>
            </div>
            <p class="reveal text-lg text-on-surface-variant leading-relaxed">
                {{ $content['about']['body'] ?? '' }}
            </p>

            <div class="reveal space-y-6">
                <div class="flex items-start gap-5">
                    <div class="mt-1 w-6 h-6 rounded-full border border-secondary flex items-center justify-center text-secondary shrink-0">
                        <iconify-icon class="text-sm" icon="solar:check-read-linear"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-primary uppercase tracking-wider mb-1">Pendekatan Strategis</p>
                        <p class="text-sm text-on-surface-variant">Setiap perkara dianalisis secara menyeluruh untuk menghasilkan solusi hukum yang efektif, terukur, dan sesuai dengan tujuan klien.</p>
                    </div>
                </div>
                <div class="flex items-start gap-5">
                    <div class="mt-1 w-6 h-6 rounded-full border border-secondary flex items-center justify-center text-secondary shrink-0">
                        <iconify-icon class="text-sm" icon="solar:shield-star-linear"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-primary uppercase tracking-wider mb-1">Integritas Profesional</p>
                        <p class="text-sm text-on-surface-variant">Kami menjunjung tinggi etika profesi, menjaga kerahasiaan informasi, serta memberikan pendampingan hukum secara independen dan bertanggung jawab.</p>
                    </div>
                </div>
                <div class="flex items-start gap-5">
                    <div class="mt-1 w-6 h-6 rounded-full border border-secondary flex items-center justify-center text-secondary shrink-0">
                        <iconify-icon class="text-sm" icon="solar:handshake-linear"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-primary uppercase tracking-wider mb-1">Berorientasi pada Klien</p>
                        <p class="text-sm text-on-surface-variant">Kami percaya bahwa keberhasilan layanan hukum tidak hanya diukur dari penyelesaian perkara, tetapi juga dari kepercayaan dan hubungan jangka panjang yang terjalin dengan setiap klien.</p>
                    </div>
                </div>
            </div>

            <div class="reveal">
                <a href="{{ route('tentang') }}"
                   class="inline-block bg-primary text-surface px-10 py-4 rounded-full font-bold uppercase tracking-widest btn-lift">
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     TEAM (SNIPPET)
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-[#F9F7F8] py-section-gap" id="tim">
    <div class="mx-auto max-w-container-max px-6 md:px-8">
        <div class="text-center mb-20">
            <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">{{ $content['team']['eyebrow'] ?? 'Pakar Kami' }}</p>
            <h2 class="reveal font-headline text-4xl md:text-6xl text-primary">{{ $content['team']['headline'] ?? 'Tim Advokat Profesional' }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($team as $m)
            <article class="reveal group rounded-[32px] bg-white border border-primary/5 overflow-hidden grad-border transition-all duration-500 hover:shadow-2xl hover:shadow-primary/10">
                <div class="aspect-[4/5] overflow-hidden">
                    <img alt="{{ $m->name }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" src="{{ $m->photo_url }}">
                </div>
                <div class="p-8 text-center">
                    <h4 class="font-headline text-2xl text-primary">{{ $m->name }}</h4>
                    <p class="text-xs font-bold text-secondary uppercase tracking-widest mt-2 mb-6">{{ $m->role }}</p>
                    <div class="flex justify-center gap-4">
                        <a class="w-10 h-10 rounded-full border border-primary/10 flex items-center justify-center text-primary/40 hover:text-secondary hover:border-secondary transition-colors" href="#">
                            <iconify-icon icon="solar:link-linear"></iconify-icon>
                        </a>
                        <a class="w-10 h-10 rounded-full border border-primary/10 flex items-center justify-center text-primary/40 hover:text-secondary hover:border-secondary transition-colors" href="#">
                            <iconify-icon icon="solar:letter-linear"></iconify-icon>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        <div class="text-center mt-16">
            <a href="{{ route('tim') }}"
               class="inline-block border border-primary/20 text-primary px-10 py-4 rounded-full font-bold uppercase tracking-widest hover:bg-primary/5 transition-colors btn-lift">
                Lihat Semua Tim
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-primary py-section-gap relative overflow-hidden">
    <div class="parallax absolute inset-0 opacity-20"
         style="background:radial-gradient(circle at 10% 20%,rgba(184,154,114,.3),transparent),radial-gradient(circle at 90% 80%,rgba(253,251,252,.1),transparent);filter:blur(100px)"></div>
    <div class="mx-auto max-w-container-max px-6 md:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <div class="reveal">
                <p class="text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-6">{{ $content['testimonials']['eyebrow'] ?? 'Pengalaman Klien' }}</p>
                <h2 class="font-headline text-4xl md:text-6xl text-surface leading-tight">{{ $content['testimonials']['headline'] ?? 'Apa Kata Klien Kami' }}</h2>
                <div class="mt-12 space-y-4">
                    @foreach($testimonials as $i => $t)
                    <div class="faq-item reveal rounded-2xl border border-surface/10 bg-surface/5 overflow-hidden">
                        <button aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                class="faq-btn w-full flex items-center justify-between gap-4 px-8 py-6 text-left">
                            <span class="text-lg font-medium text-surface italic">{{ $t->quote }}</span>
                            <iconify-icon class="faq-icon text-xl text-secondary shrink-0 transition-transform duration-300 {{ $i === 0 ? 'rotate-180' : '' }}"
                                          icon="solar:alt-arrow-down-linear"></iconify-icon>
                        </button>
                        <div class="faq-body overflow-hidden transition-all duration-500" style="max-height:{{ $i === 0 ? '200px' : '0' }}">
                            <div class="px-8 pb-6">
                                <p class="text-sm font-bold text-secondary uppercase tracking-widest">{{ $t->author_name }}</p>
                                <p class="text-xs text-surface/60 mt-1">{{ $t->author_role }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="reveal relative hidden lg:block">
                <div class="rounded-[40px] overflow-hidden aspect-square border border-surface/10">
                    <img alt="Legal Shield" class="w-full h-full object-cover opacity-80"
                         src="{{ asset('images/law2.png') }}">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script>
    // Carousel
    const car = document.getElementById('carousel');
    document.getElementById('carNext')?.addEventListener('click', () => car.scrollBy({ left: 370, behavior: 'smooth' }));
    document.getElementById('carPrev')?.addEventListener('click', () => car.scrollBy({ left: -370, behavior: 'smooth' }));
</script>
@endsection
