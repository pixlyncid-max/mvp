@extends('layouts.app')

@section('title', 'Tentang Kami — ' . ($settings['site_name'] ?? 'MVP Law Firm'))
@section('meta_description', $settings['meta_tentang'])

@section('content')

<!-- ═══════════════════════════════════════════════════════════════════
     HERO — FULL BLEED IMAGE
══════════════════════════════════════════════════════════════════════ -->
<section class="relative h-[70vh] min-h-[500px] overflow-hidden flex items-end">
    <img alt="Kantor MVP Law Firm" class="absolute inset-0 w-full h-full object-cover"
         src="{{ asset('images/law3.png') }}">
    <div class="absolute inset-0"
         style="background:linear-gradient(to top,rgba(15,19,46,.85) 0%,rgba(15,19,46,.3) 60%,transparent 100%)"></div>
    <div class="relative z-10 mx-auto max-w-container-max px-6 md:px-8 pb-20 w-full">
        <span class="text-xs font-bold tracking-[0.2em] text-secondary uppercase">Tentang Kami</span>
        <h1 class="font-headline text-5xl md:text-7xl lg:text-[88px] text-surface leading-[1.05] mt-4 max-w-3xl font-semibold">
            Tentang Kami
        </h1>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     STORY
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-surface py-section-gap">
    <div class="mx-auto max-w-container-max px-6 md:px-8 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">

        <div class="space-y-8">
            <div>
                <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">{{ $content['story']['eyebrow'] ?? 'Warisan Keadilan' }}</p>
                <h2 class="reveal font-headline text-4xl md:text-5xl lg:text-6xl text-primary leading-tight font-semibold">
                    {{ $content['story']['headline'] ?? 'Warisan Keadilan dan Dedikasi Sejak 1994' }}
                </h2>
            </div>
            <div class="w-12 h-px bg-secondary"></div>
            <p class="reveal text-lg text-on-surface-variant leading-relaxed">
                {{ $content['story']['para_1'] ?? '' }}
            </p>
            <p class="reveal text-lg text-on-surface-variant leading-relaxed">
                {{ $content['story']['para_2'] ?? '' }}
            </p>
        </div>

        <div class="reveal relative">
            <div class="rounded-[32px] overflow-hidden aspect-[4/5] shadow-2xl shadow-primary/10">
                <img alt="Perpustakaan Hukum MVP Law Firm"
                     class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-1000"
                     src="{{ asset('images/law1.png') }}">
            </div>
            <div class="absolute -bottom-8 -left-8 bg-secondary p-8 rounded-2xl hidden md:block">
                <p class="text-4xl font-headline text-surface">{{ date('Y') - ($settings['founded_year'] ?? 1994) }}+</p>
                <p class="text-xs font-bold text-surface/70 uppercase tracking-widest mt-1">Tahun Berdiri</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     MISSION QUOTE
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-primary py-24 relative overflow-hidden">
    <div class="parallax absolute inset-0 opacity-20"
         style="background:radial-gradient(ellipse 60% 60% at 30% 50%,rgba(184,154,114,.3),transparent);filter:blur(80px)"></div>
    <div class="mx-auto max-w-container-max px-6 md:px-8 text-center relative z-10">
        <iconify-icon class="text-4xl text-secondary mb-8 block" icon="solar:quote-up-bold"></iconify-icon>
        <p class="reveal font-headline text-2xl md:text-4xl lg:text-5xl text-surface leading-tight max-w-4xl mx-auto italic">
            {{ $content['mission']['quote'] ?? '' }}
        </p>
        <p class="reveal mt-10 text-xs font-bold tracking-[0.2em] text-secondary uppercase">Visi Kami</p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     CORE VALUES
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-[#F6F3F4] py-section-gap">
    <div class="mx-auto max-w-container-max px-6 md:px-8">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">Nilai-Nilai Inti</p>
            <h2 class="reveal font-headline text-4xl md:text-5xl text-primary font-semibold mb-6">Nilai yang Menjadi Landasan Setiap Langkah Kami</h2>
            <p class="reveal text-on-surface-variant text-base md:text-lg leading-relaxed">
                Di MVP Law Firm, kami percaya bahwa kualitas layanan hukum tidak hanya ditentukan oleh keahlian, tetapi juga oleh nilai-nilai yang kami pegang dalam setiap hubungan profesional. Nilai-nilai ini menjadi fondasi dalam memberikan layanan kepada setiap klien.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
            @foreach([
                [
                    'icon' => 'solar:shield-star-linear',
                    'title' => 'Integritas',
                    'desc' => 'Kami menjunjung tinggi kejujuran, etika profesi, dan tanggung jawab dalam setiap tindakan. Setiap keputusan dan pendampingan hukum diberikan secara independen dengan mengutamakan kepentingan terbaik klien serta kepatuhan terhadap hukum dan kode etik advokat.'
                ],
                [
                    'icon' => 'solar:diploma-verified-linear',
                    'title' => 'Profesionalisme',
                    'desc' => 'Kami memberikan layanan hukum berdasarkan kompetensi, ketelitian, dan standar profesional yang tinggi. Setiap perkara ditangani secara sistematis, tepat waktu, dan dengan perhatian penuh terhadap setiap detail.'
                ],
                [
                    'icon' => 'solar:hand-shake-linear',
                    'title' => 'Kepercayaan',
                    'desc' => 'Kepercayaan merupakan fondasi dari setiap hubungan dengan klien. Kami menjaga kerahasiaan informasi, membangun komunikasi yang transparan, dan memberikan pendampingan hukum yang konsisten serta dapat diandalkan.'
                ],
                [
                    'icon' => 'solar:lightbulb-bolt-linear',
                    'title' => 'Solusi',
                    'desc' => 'Kami percaya bahwa setiap persoalan hukum membutuhkan pendekatan yang strategis. Oleh karena itu, kami tidak hanya mengidentifikasi risiko hukum, tetapi juga menghadirkan solusi yang praktis, efektif, dan sesuai dengan tujuan klien.'
                ],
                [
                    'icon' => 'solar:users-group-two-rounded-linear',
                    'title' => 'Kolaborasi',
                    'desc' => 'Kami memandang setiap penugasan sebagai kemitraan. Dengan memahami kebutuhan dan tujuan klien secara menyeluruh, kami bekerja secara kolaboratif untuk menghasilkan solusi hukum yang memberikan nilai tambah dan manfaat jangka panjang.'
                ]
            ] as $v)
            <div class="reveal bg-white rounded-[28px] p-10 border border-primary/5 grad-border group hover:shadow-xl hover:shadow-primary/8 transition-all duration-500 text-center">
                <div class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary mx-auto mb-8 group-hover:bg-secondary/20 transition-colors">
                    <iconify-icon class="text-3xl" icon="{{ $v['icon'] }}"></iconify-icon>
                </div>
                <h3 class="font-headline text-2xl text-primary mb-4 font-semibold">{{ $v['title'] }}</h3>
                <p class="text-on-surface-variant text-sm leading-relaxed">{{ $v['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     MEET THE TEAM CTA
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-[#F9F7F8] py-24">
    <div class="mx-auto max-w-container-max px-6 md:px-8 text-center">
        <h2 class="reveal font-headline text-4xl md:text-6xl text-primary mb-8 font-semibold">Mari Temukan Solusi Hukum Terbaik</h2>
        <p class="reveal text-lg text-on-surface-variant max-w-xl mx-auto mb-12 leading-relaxed">
            Diskusikan kebutuhan hukum Anda bersama tim kami. Dengan pendekatan yang strategis, profesional, dan berorientasi pada solusi, kami siap membantu Anda mengambil langkah hukum yang tepat.
        </p>
        <div class="reveal flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('tim') }}"
               class="bg-primary text-surface px-10 py-5 rounded-full font-bold uppercase tracking-widest btn-lift">
                Kenali Tim Kami
            </a>
            <a href="{{ route('kontak') }}"
               class="border border-primary/10 text-primary px-10 py-5 rounded-full font-bold uppercase tracking-widest hover:bg-primary/5 transition-colors btn-lift">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection
