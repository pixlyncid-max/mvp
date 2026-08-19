@extends('layouts.app')

@section('title', $member->name . ' — ' . $member->role . ' | ' . ($settings['site_name'] ?? 'MVP Law Firm'))
@section('meta_description', Str::limit(strip_tags($member->bio ?: ($member->name . ' adalah ' . $member->role . ' di MVP Law Firm spesialisasi ' . $member->specialty)), 160))

@section('content')

<!-- ═══════════════════════════════════════════════════════════════════
     BREADCRUMB & HEADER
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-surface pt-12 pb-16 relative overflow-hidden border-b border-primary/5">
    <div class="absolute inset-0 pointer-events-none"
         style="background:radial-gradient(ellipse 70% 50% at 50% 0%,rgba(184,154,114,.08),transparent)"></div>
    <div class="mx-auto max-w-container-max px-6 md:px-8 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-on-surface-variant/70 mb-8">
            <a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('tim') }}" class="hover:text-secondary transition-colors">Tim Advokat</a>
            <span>/</span>
            <span class="text-secondary font-bold truncate max-w-[200px] md:max-w-none">{{ $member->name }}</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-secondary/10 text-secondary mb-4 border border-secondary/20">
                    {{ $member->role }}
                </span>
                <h1 class="reveal font-headline text-4xl md:text-6xl text-primary font-semibold tracking-tight">
                    {{ $member->name }}
                </h1>
                <p class="reveal text-lg md:text-xl text-secondary font-medium mt-3">
                    {{ $member->specialty }}
                </p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('tim') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-primary/70 hover:text-secondary border border-primary/10 hover:border-secondary px-6 py-3.5 rounded-full transition-all btn-lift">
                    <iconify-icon icon="solar:arrow-left-linear" class="text-base"></iconify-icon>
                    Kembali ke Tim
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     PROFILE DETAILS MAIN CONTENT
══════════════════════════════════════════════════════════════════════ -->
<section class="bg-[#F9F7F8] py-16 md:py-24">
    <div class="mx-auto max-w-container-max px-6 md:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- LEFT COLUMN: FOTO & KONTAK KARTU (4 cols) -->
            <div class="lg:col-span-4 space-y-8 lg:sticky lg:top-28">
                <!-- Foto Card -->
                <div class="rounded-[32px] bg-white border border-primary/5 grad-border overflow-hidden p-3 shadow-xl shadow-primary/5">
                    <div class="aspect-[4/5] rounded-[24px] overflow-hidden relative bg-gray-100">
                        @if($member->photo_url)
                            <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-primary/5 text-primary/30">
                                <iconify-icon icon="solar:user-bold" class="text-7xl"></iconify-icon>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Direct Contact Actions -->
                        <div class="space-y-3 pt-2">
                            @if($member->phone)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $member->phone) }}?text=Halo%20{{ urlencode($member->name) }},%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20hukum" target="_blank"
                                   class="w-full bg-secondary text-surface py-4 px-6 rounded-2xl font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors shadow-md btn-lift">
                                    <iconify-icon icon="solar:chat-round-dots-bold" class="text-lg"></iconify-icon>
                                    Konsultasi WhatsApp
                                </a>
                            @else
                                <a href="{{ route('kontak') }}"
                                   class="w-full bg-secondary text-surface py-4 px-6 rounded-2xl font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-secondary/90 transition-colors shadow-md btn-lift">
                                    <iconify-icon icon="solar:chat-round-dots-bold" class="text-lg"></iconify-icon>
                                    Jadwalkan Konsultasi
                                </a>
                            @endif

                            @if($member->email)
                                <a href="mailto:{{ $member->email }}"
                                   class="w-full border border-primary/15 text-primary py-3.5 px-6 rounded-2xl font-semibold text-xs flex items-center justify-center gap-2 hover:bg-primary/5 transition-colors">
                                    <iconify-icon icon="solar:letter-linear" class="text-base"></iconify-icon>
                                    {{ $member->email }}
                                </a>
                            @endif

                            @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank"
                                   class="w-full border border-[#0A66C2]/30 text-[#0A66C2] py-3.5 px-6 rounded-2xl font-semibold text-xs flex items-center justify-center gap-2 hover:bg-[#0A66C2]/5 transition-colors">
                                    <iconify-icon icon="solar:link-bold" class="text-base"></iconify-icon>
                                    LinkedIn Profile
                                </a>
                            @endif
                        </div>

                        <!-- Keahlian Spesifik Badges -->
                        @if($member->expertise && count($member->expertise) > 0)
                            <div class="pt-6 border-t border-primary/5">
                                <p class="text-xs font-bold text-primary uppercase tracking-widest mb-3">Bidang Keahlian</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($member->expertise as $exp)
                                        @if(trim($exp) !== '')
                                            <span class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-surface border border-primary/10 text-primary/80">
                                                {{ $exp }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: BIO & DETAILED PROFILE (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- 1. BIOGRAFI / PROFIL SINGKAT -->
                <div class="rounded-[32px] bg-white p-8 md:p-12 border border-primary/5 grad-border shadow-xl shadow-primary/5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
                            <iconify-icon icon="solar:user-id-linear" class="text-2xl"></iconify-icon>
                        </div>
                        <h2 class="font-headline text-2xl md:text-3xl text-primary font-semibold">
                            Biografi &amp; Latar Belakang
                        </h2>
                    </div>
                    <div class="w-12 h-px bg-secondary mb-6"></div>
                    
                    <div class="text-on-surface-variant leading-relaxed text-base md:text-lg space-y-4 font-normal">
                        @if($member->bio)
                            {!! nl2br(e($member->bio)) !!}
                        @else
                            <p>
                                {{ $member->name }} menjabat sebagai <strong>{{ $member->role }}</strong> di MVP Law Firm, dengan fokus utama pada bidang <strong>{{ $member->specialty }}</strong>. Berpengalaman luas dalam memberikan konsultasi hukum strategis, analisis kepatuhan regulasi, serta penyelesaian sengketa hukum secara komprehensif demi melindungi hak dan kepentingan klien.
                            </p>
                            <p>
                                Dengan integritas tinggi, ketelitian mendalam, dan komitmen profesional yang konsisten, {{ $member->name }} berdedikasi mendampingi setiap klien individu maupun institusi korporasi dalam menghadapi dinamika hukum Indonesia.
                            </p>
                        @endif
                    </div>
                </div>

                <!-- 2. RIWAYAT PENDIDIKAN -->
                @if($member->education && count($member->education) > 0)
                <div class="rounded-[32px] bg-white p-8 md:p-12 border border-primary/5 grad-border shadow-xl shadow-primary/5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
                            <iconify-icon icon="solar:diploma-verified-linear" class="text-2xl"></iconify-icon>
                        </div>
                        <h2 class="font-headline text-2xl md:text-3xl text-primary font-semibold">
                            Riwayat Pendidikan
                        </h2>
                    </div>
                    <div class="w-12 h-px bg-secondary mb-6"></div>

                    <div class="space-y-4">
                        @foreach($member->education as $edu)
                            @if(trim($edu) !== '')
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-surface border border-primary/5">
                                <div class="w-2.5 h-2.5 rounded-full bg-secondary mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-primary font-medium text-base md:text-lg">{{ $edu }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- 3. PENGALAMAN & REKAM JEJAK HUKUM -->
                @if($member->experience && count($member->experience) > 0)
                <div class="rounded-[32px] bg-white p-8 md:p-12 border border-primary/5 grad-border shadow-xl shadow-primary/5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
                            <iconify-icon icon="solar:case-round-linear" class="text-2xl"></iconify-icon>
                        </div>
                        <h2 class="font-headline text-2xl md:text-3xl text-primary font-semibold">
                            Pengalaman &amp; Rekam Jejak
                        </h2>
                    </div>
                    <div class="w-12 h-px bg-secondary mb-6"></div>

                    <div class="space-y-4">
                        @foreach($member->experience as $expItem)
                            @if(trim($expItem) !== '')
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-surface border border-primary/5">
                                <div class="w-2.5 h-2.5 rounded-full bg-primary mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-primary font-medium text-base md:text-lg">{{ $expItem }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- 4. SERTIFIKASI & KEANGGOTAAN -->
                @if($member->achievements && count($member->achievements) > 0)
                <div class="rounded-[32px] bg-white p-8 md:p-12 border border-primary/5 grad-border shadow-xl shadow-primary/5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
                            <iconify-icon icon="solar:medal-ribbon-star-linear" class="text-2xl"></iconify-icon>
                        </div>
                        <h2 class="font-headline text-2xl md:text-3xl text-primary font-semibold">
                            Sertifikasi &amp; Keanggotaan Profesional
                        </h2>
                    </div>
                    <div class="w-12 h-px bg-secondary mb-6"></div>

                    <div class="space-y-4">
                        @foreach($member->achievements as $ach)
                            @if(trim($ach) !== '')
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-surface border border-primary/5">
                                <div class="w-2.5 h-2.5 rounded-full bg-secondary mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-primary font-medium text-base md:text-lg">{{ $ach }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- CTA BANNER DALAM DETAIL PROFIL -->
                <div class="rounded-[32px] bg-primary p-8 md:p-12 text-surface relative overflow-hidden">
                    <div class="relative z-10 space-y-4">
                        <h3 class="font-headline text-2xl md:text-3xl font-semibold">
                            Konsultasikan Kasus Anda Bersama {{ explode(' ', $member->name)[0] }}
                        </h3>
                        <p class="text-surface/80 text-base max-w-xl">
                            Dapatkan analisis hukum objektif dan pendampingan profesional yang dirancang khusus untuk melindungi kepentingan Anda.
                        </p>
                        <div class="pt-4">
                            <a href="{{ route('kontak') }}" class="inline-block bg-secondary text-surface px-8 py-4 rounded-full font-bold uppercase tracking-widest text-xs btn-lift">
                                Hubungi Kantor Kami
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     OTHER TEAM MEMBERS (EXPLORE)
══════════════════════════════════════════════════════════════════════ -->
@if($otherMembers->count() > 0)
<section class="bg-surface py-20 border-t border-primary/5">
    <div class="mx-auto max-w-container-max px-6 md:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <h2 class="font-headline text-3xl md:text-4xl text-primary font-semibold">
                    Advokat Lainnya
                </h2>
                <p class="text-on-surface-variant text-sm mt-2">
                    Kenali rekan advokat profesional lainnya di MVP Law Firm
                </p>
            </div>
            <a href="{{ route('tim') }}" class="text-xs font-bold text-secondary uppercase tracking-widest hover:underline flex items-center gap-1">
                Lihat Semua Tim <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($otherMembers as $om)
            <a href="{{ route('tim.detail', $om->slug ?: $om->id) }}" class="group block">
                <article class="rounded-[32px] bg-white border border-primary/5 overflow-hidden grad-border transition-all duration-500 hover:shadow-2xl hover:shadow-primary/10 flex flex-col h-full">
                    <div class="aspect-[4/5] overflow-hidden relative bg-gray-100">
                        @if($om->photo_url)
                            <img alt="{{ $om->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ $om->photo_url }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-primary/5 text-primary/30">
                                <iconify-icon icon="solar:user-bold" class="text-6xl"></iconify-icon>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="text-[11px] font-bold text-secondary uppercase tracking-widest">{{ $om->role }}</span>
                        <h4 class="font-headline text-xl text-primary font-semibold mt-1 mb-1 group-hover:text-secondary transition-colors">{{ $om->name }}</h4>
                        <p class="text-xs text-on-surface-variant line-clamp-1">{{ $om->specialty }}</p>
                    </div>
                </article>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
