@extends('layouts.app')

@section('title', 'Kontak & Konsultasi — ' . ($settings['site_name'] ?? 'MVP Law Firm'))
@section('meta_description', $settings['meta_kontak'])

@section('content')

    <!-- ═══════════════════════════════════════════════════════════════════
                 HERO
            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-surface pt-20 pb-24 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none"
            style="background:radial-gradient(ellipse 70% 50% at 50% 0%,rgba(184,154,114,.1),transparent)"></div>
        <div class="mx-auto max-w-container-max px-6 md:px-8 relative z-10">
            <span class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase">Hubungi Kami</span>
            <h1
                class="reveal font-headline text-5xl md:text-7xl lg:text-[88px] text-primary leading-[1.05] tracking-tight mt-4 max-w-3xl font-semibold">
                Kami Siap Mendengarkan Anda
            </h1>
            <div class="w-12 h-px bg-secondary mt-8 mb-8"></div>
            <p class="reveal text-lg md:text-xl text-on-surface-variant max-w-2xl leading-relaxed">
                Apabila Anda memerlukan konsultasi hukum, pendampingan perkara, atau layanan hukum bagi perusahaan, silakan
                hubungi tim kami. Kami akan merespons setiap pertanyaan secara profesional dan menjaga kerahasiaan informasi
                yang Anda sampaikan.
            </p>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                 CONTACT MAIN AREA
            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-[#F6F3F4] py-section-gap">
        <div class="mx-auto max-w-container-max px-6 md:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16">

            <!-- FORM -->
            <div
                class="reveal bg-white rounded-[32px] p-10 md:p-14 border border-primary/5 grad-border shadow-xl shadow-primary/5">
                <h2 class="font-headline text-3xl text-primary mb-2 font-semibold">Kirim Pesan</h2>
                <p class="text-sm text-on-surface-variant mb-10">Isi formulir di bawah ini dan tim kami akan menghubungi
                    Anda dalam 1×24 jam kerja.</p>

                <form class="space-y-8" id="contactForm">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="relative group">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary/50 mb-2"
                                for="nama">Nama Lengkap</label>
                            <input id="nama" name="nama" type="text" placeholder="Contoh: Budi Santoso"
                                class="w-full bg-transparent border-0 border-b border-primary/20 focus:border-secondary focus:ring-0 px-0 py-3 transition-all text-primary placeholder-primary/30 text-sm">
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-secondary transition-all duration-300 group-focus-within:w-full">
                            </div>
                        </div>
                        <div class="relative group">
                            <label class="block text-xs font-bold uppercase tracking-widest text-primary/50 mb-2"
                                for="email">Alamat Email</label>
                            <input id="email" name="email" type="email" placeholder="budi@email.com"
                                class="w-full bg-transparent border-0 border-b border-primary/20 focus:border-secondary focus:ring-0 px-0 py-3 transition-all text-primary placeholder-primary/30 text-sm">
                            <div
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-secondary transition-all duration-300 group-focus-within:w-full">
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-primary/50 mb-2"
                            for="subjek">Subjek</label>
                        <input id="subjek" name="subjek" type="text" placeholder="Topik konsultasi hukum Anda"
                            class="w-full bg-transparent border-0 border-b border-primary/20 focus:border-secondary focus:ring-0 px-0 py-3 transition-all text-primary placeholder-primary/30 text-sm">
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-secondary transition-all duration-300 group-focus-within:w-full">
                        </div>
                    </div>

                    <div class="relative group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-primary/50 mb-2"
                            for="layanan">Layanan yang Dibutuhkan</label>
                        <select id="layanan" name="layanan"
                            class="w-full bg-transparent border-0 border-b border-primary/20 focus:border-secondary focus:ring-0 px-0 py-3 transition-all text-primary text-sm">
                            <option value="">— Pilih layanan —</option>
                            @foreach($services as $s)
                                <option value="{{ Str::slug($s->title) }}">{{ $s->title }}</option>
                            @endforeach
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-secondary transition-all duration-300 group-focus-within:w-full">
                        </div>
                    </div>

                    <div class="relative group">
                        <label class="block text-xs font-bold uppercase tracking-widest text-primary/50 mb-2"
                            for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="5"
                            placeholder="Jelaskan kebutuhan hukum Anda secara singkat..."
                            class="w-full bg-transparent border-0 border-b border-primary/20 focus:border-secondary focus:ring-0 px-0 py-3 transition-all text-primary placeholder-primary/30 text-sm resize-none"></textarea>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-secondary transition-all duration-300 group-focus-within:w-full">
                        </div>
                    </div>

                    <button id="submitBtn" type="submit"
                        class="bg-primary text-surface w-full py-5 rounded-full font-bold uppercase tracking-widest btn-lift flex items-center justify-center gap-3">
                        <iconify-icon icon="solar:letter-linear"></iconify-icon>
                        Kirim Sekarang
                    </button>

                    <!-- Success message (hidden by default) -->
                    <div id="successMsg"
                        class="hidden rounded-2xl bg-secondary/10 border border-secondary/30 p-6 text-center">
                        <iconify-icon class="text-3xl text-secondary block mb-2"
                            icon="solar:check-circle-bold"></iconify-icon>
                        <p class="text-sm font-bold text-primary">Pesan Anda telah terkirim!</p>
                        <p class="text-xs text-on-surface-variant mt-1">Tim kami akan menghubungi Anda dalam 1×24 jam kerja.
                        </p>
                    </div>
                </form>
            </div>

            <!-- INFO -->
            <div class="space-y-10">
                <!-- Informasi Kantor -->
                <div class="reveal">
                    <h2 class="font-headline text-3xl text-primary mb-8 font-semibold">Informasi Kantor</h2>
                    <div class="space-y-8">
                        <div class="flex items-start gap-5">
                            <div
                                class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary flex-shrink-0">
                                <iconify-icon class="text-xl" icon="solar:map-point-linear"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-primary uppercase tracking-wider mb-1">Alamat</p>
                                <p class="text-sm text-on-surface-variant">{{ $settings['address'] ?? '' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-5">
                            <div
                                class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary flex-shrink-0">
                                <iconify-icon class="text-xl" icon="solar:phone-linear"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-primary uppercase tracking-wider mb-1">Telepon</p>
                                <p class="text-sm text-on-surface-variant">{{ $settings['phone'] ?? '' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-5">
                            <div
                                class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary flex-shrink-0">
                                <iconify-icon class="text-xl" icon="solar:letter-linear"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-primary uppercase tracking-wider mb-1">Email</p>
                                <p class="text-sm text-on-surface-variant">{{ $settings['email'] ?? '' }}</p>
                                <p class="text-sm text-on-surface-variant">{{ $settings['email_consult'] ?? '' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-5">
                            <div
                                class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary flex-shrink-0">
                                <iconify-icon class="text-xl" icon="solar:clock-circle-linear"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-primary uppercase tracking-wider mb-1">Jam Operasional</p>
                                <p class="text-sm text-on-surface-variant">{{ $settings['office_hours'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Contact Buttons -->
                <div class="reveal flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp'] ?? '') }}"
                        class="flex-1 flex items-center justify-center gap-3 bg-[#25D366] text-white py-4 rounded-full font-bold text-sm uppercase tracking-wider btn-lift">
                        <iconify-icon icon="solar:chat-round-line-linear" class="text-xl"></iconify-icon>
                        WhatsApp
                    </a>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone'] ?? '') }}"
                        class="flex-1 flex items-center justify-center gap-3 border border-primary/10 text-primary py-4 rounded-full font-bold text-sm uppercase tracking-wider hover:bg-primary/5 transition-colors btn-lift">
                        <iconify-icon icon="solar:phone-linear" class="text-xl"></iconify-icon>
                        Telepon
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                 MAP
            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-surface py-section-gap">
        <div class="mx-auto max-w-container-max px-6 md:px-8">
            <div class="reveal rounded-[32px] overflow-hidden border border-primary/5 shadow-xl shadow-primary/5 relative">
                @php
                    $originalUrl = $settings['maps_embed_url'] ?? '';
                    $embedUrl = '';
                    if ($originalUrl) {
                        $embedUrl = Cache::remember('resolved_map_url_' . md5($originalUrl), 86400, function() use ($originalUrl) {
                            $url = $originalUrl;
                            if (str_contains($url, 'maps.app.goo.gl') || str_contains($url, 'goo.gl/maps')) {
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_HEADER, true);
                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_NOBODY, true);
                                curl_setopt($ch, CURLOPT_TIMEOUT, 4);
                                curl_exec($ch);
                                $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                                curl_close($ch);
                                if ($effectiveUrl) {
                                    $url = $effectiveUrl;
                                }
                            }
                            return $url;
                        });

                        // Convert long URL to embed format
                        if ($embedUrl && !str_contains($embedUrl, 'embed') && !str_contains($embedUrl, 'output=embed')) {
                            if (preg_match('/\/place\/([^\/]+)/', $embedUrl, $matches)) {
                                $place = str_replace('+', ' ', urldecode($matches[1]));
                                $query = $place . " Samarinda";
                                $embedUrl = "https://maps.google.com/maps?q=" . urlencode($query) . "&t=&z=16&ie=UTF8&iwloc=&output=embed";
                            } elseif (preg_match('/0x[0-9a-fA-F]+:0x([0-9a-fA-F]+)/', $embedUrl, $cidMatches)) {
                                $cidDec = sprintf('%.0f', hexdec($cidMatches[1]));
                                $embedUrl = "https://maps.google.com/maps?q=cid:" . $cidDec . "&t=&z=16&ie=UTF8&iwloc=&output=embed";
                            } elseif (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $embedUrl, $matches)) {
                                $embedUrl = "https://maps.google.com/maps?q=" . $matches[1] . "," . $matches[2] . "&t=&z=16&ie=UTF8&iwloc=&output=embed";
                            } else {
                                $embedUrl = "https://maps.google.com/maps?q=" . urlencode($settings['address'] ?? '') . "&t=&z=16&ie=UTF8&iwloc=&output=embed";
                            }
                        }
                    }
                @endphp
                <iframe class="w-full" style="height:480px;border:0;filter:grayscale(20%) contrast(1.1)" loading="lazy"
                    allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                    src="{{ $embedUrl }}">
                </iframe>
                <!-- Map overlay card -->
                <div class="absolute bottom-6 left-6 bg-primary rounded-2xl p-6 max-w-xs shadow-2xl">
                    <p class="text-xs font-bold text-secondary uppercase tracking-widest mb-1">Kantor Pusat</p>
                    <p class="text-sm font-bold text-surface">MVP Law Firm</p>
                    <p class="text-xs text-surface/60 mt-1">{{ $settings['address'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════
                 FAQ
            ══════════════════════════════════════════════════════════════════════ -->
    <section class="bg-[#F6F3F4] py-section-gap">
        <div class="mx-auto max-w-container-max px-6 md:px-8">
            <div class="grid lg:grid-cols-2 gap-20 items-start">
                <div>
                    <p class="reveal text-xs font-bold tracking-[0.2em] text-secondary uppercase mb-4">Pertanyaan Umum</p>
                    <h2 class="reveal font-headline text-4xl md:text-5xl text-primary leading-tight font-semibold">
                        Yang Sering Ditanyakan
                    </h2>
                    <p class="reveal mt-6 text-on-surface-variant leading-relaxed">
                        Tidak menemukan jawaban yang Anda cari? Jangan ragu untuk menghubungi tim kami secara langsung.
                    </p>
                </div>
                <div class="space-y-4">
                    @php
                        $faqs = [
                            [
                                'q' => 'Layanan hukum apa saja yang disediakan oleh MVP Law Firm?',
                                'a' => 'MVP Law Firm memberikan layanan hukum bagi individu, perusahaan, dan investor, meliputi Hukum Perdata, Hukum Pidana, Hukum Korporasi, Hukum Pertambangan, Hukum Properti & Pertanahan, Hukum Keluarga & Waris, Kekayaan Intelektual, serta layanan konsultasi, penyusunan kontrak, legal opinion, dan legal due diligence.',
                                'open' => true
                            ],
                            [
                                'q' => 'Bagaimana cara membuat janji konsultasi?',
                                'a' => 'Anda dapat menghubungi kami melalui WhatsApp, telepon, email, atau mengisi formulir pada halaman Kontak. Tim kami akan menghubungi Anda untuk menjadwalkan konsultasi sesuai waktu yang tersedia.',
                                'open' => false
                            ],
                            [
                                'q' => 'Berapa biaya konsultasi hukum?',
                                'a' => 'Biaya konsultasi bergantung pada jenis layanan, kompleksitas permasalahan, dan kebutuhan pendampingan. Informasi mengenai biaya akan disampaikan secara transparan sebelum layanan diberikan.',
                                'open' => false
                            ],
                            [
                                'q' => 'Apakah informasi yang saya sampaikan akan dijaga kerahasiaannya?',
                                'a' => 'Tentu. Kerahasiaan informasi klien merupakan salah satu prinsip utama kami. Seluruh informasi yang diberikan selama proses konsultasi maupun pendampingan hukum diperlakukan secara rahasia sesuai dengan kode etik profesi advokat.',
                                'open' => false
                            ],
                        ];
                    @endphp
                    @foreach($faqs as $faq)
                        <div class="faq-item reveal rounded-2xl border border-primary/5 bg-white overflow-hidden shadow-sm">
                            <button aria-expanded="{{ $faq['open'] ? 'true' : 'false' }}"
                                class="faq-btn w-full flex items-center justify-between gap-4 px-8 py-6 text-left">
                                <span class="text-base font-medium text-primary">{{ $faq['q'] }}</span>
                                <iconify-icon
                                    class="faq-icon text-xl text-secondary shrink-0 transition-transform duration-300 {{ $faq['open'] ? 'rotate-180' : '' }}"
                                    icon="solar:alt-arrow-down-linear"></iconify-icon>
                            </button>
                            <div class="faq-body overflow-hidden transition-all duration-500"
                                style="max-height:{{ $faq['open'] ? '300px' : '0' }}">
                                <div class="px-8 pb-6">
                                    <p class="text-sm text-on-surface-variant leading-relaxed">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // Form submission demo
        const form = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const waNumber = "{{ preg_replace('/[^0-9]/', '', $settings['whatsapp'] ?? '62811111111') }}";

        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                
                const name = document.getElementById('nama').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subjek').value;
                const serviceEl = document.getElementById('layanan');
                const service = serviceEl.value ? serviceEl.options[serviceEl.selectedIndex].text : '-';
                const message = document.getElementById('pesan').value;

                let waText = "*Formulir Konsultasi MVP Law Firm*\n\n";
                waText += `*Nama:* ${name}\n`;
                waText += `*Email:* ${email}\n`;
                waText += `*Subjek:* ${subject}\n`;
                waText += `*Layanan:* ${service}\n`;
                waText += `*Pesan:* ${message}`;

                const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(waText)}`;
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<iconify-icon icon="solar:refresh-linear" class="animate-spin text-xl"></iconify-icon> Mengarahkan ke WhatsApp...';
                
                setTimeout(() => {
                    window.open(waUrl, '_blank');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<iconify-icon icon="solar:letter-linear"></iconify-icon> Kirim Sekarang';
                }, 1000);
            });
        }
    </script>
@endsection