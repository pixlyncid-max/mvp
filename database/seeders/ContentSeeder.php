<?php

namespace Database\Seeders;

use App\Models\Milestone;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedServices();
        $this->seedTeam();
        $this->seedTestimonials();
        $this->seedMilestones();
        $this->seedPageContents();
    }

    private function seedServices(): void
    {
        $services = [
            ['icon' => 'solar:balance-linear',             'title' => 'Hukum Perdata',   'description' => 'Pendampingan profesional dalam sengketa kontrak, tanggung jawab perbuatan melawan hukum, dan perlindungan aset pribadi.', 'items' => ['Sengketa Kontrak & Perjanjian', 'Gugatan Ganti Rugi', 'Eksekusi Putusan Pengadilan', 'Mediasi & Negosiasi'], 'sort_order' => 1],
            ['icon' => 'solar:gavel-linear',               'title' => 'Hukum Pidana',    'description' => 'Pembelaan hukum yang tangguh untuk kasus pidana umum dan khusus, memastikan hak-hak konstitusional klien tetap terlindungi.', 'items' => ['Pendampingan di Tingkat Penyidikan', 'Pembelaan di Persidangan', 'Upaya Hukum Banding & Kasasi', 'Praperadilan'], 'sort_order' => 2],
            ['icon' => 'solar:buildings-linear',           'title' => 'Hukum Korporasi', 'description' => 'Navigasi kompleksitas legal bisnis: pendirian perusahaan, merger & akuisisi, hingga kepatuhan regulasi industri.', 'items' => ['Pendirian & Restrukturisasi PT', 'Merger & Akuisisi', 'Due Diligence Hukum', 'Kepatuhan GCG & Regulasi'], 'sort_order' => 3],
            ['icon' => 'solar:users-group-rounded-linear', 'title' => 'Hukum Keluarga',  'description' => 'Penanganan perkara perceraian, hak asuh anak, dan pembagian harta ganjil dengan penyelesaian yang empatik namun tetap profesional.', 'items' => ['Perceraian & Hak Asuh Anak', 'Pembagian Harta Bersama', 'Perjanjian Pra-nikah', 'Penetapan Waris'], 'sort_order' => 4],
            ['icon' => 'solar:home-2-linear',              'title' => 'Hukum Properti',  'description' => 'Layanan legal untuk transaksi properti, sengketa lahan, sertifikasi tanah, dan manajemen aset real estat komersial.', 'items' => ['Jual Beli & Sewa Properti', 'Sengketa Kepemilikan Tanah', 'Sertifikasi & Balik Nama', 'Pengembangan Properti'], 'sort_order' => 5],
            ['icon' => 'solar:medal-ribbons-star-linear',  'title' => 'HAKI',            'description' => 'Registrasi merek, hak cipta, paten, dan penanganan sengketa kekayaan intelektual untuk melindungi inovasi Anda.', 'items' => ['Pendaftaran Merek & Logo', 'Paten & Desain Industri', 'Hak Cipta Karya', 'Sengketa Pelanggaran HAKI'], 'sort_order' => 6],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(['title' => $s['title']], array_merge($s, ['is_active' => true]));
        }
    }

    private function seedTeam(): void
    {
        $members = [
            ['name' => 'Alibangso Karsono, S.H., LL.M.', 'role' => 'Senior Partner',    'specialty' => 'Hukum Korporasi & Investasi', 'expertise' => ['Merger & Akuisisi', 'Arbitrase Internasional', 'Mediasi Bisnis'], 'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDu5BPjD5P2KtY48vdYDpCXz7e2XiGT6ElmXfUsfM_5laZP94Rf5oy7ryeQ1RI6kTxj4dnBgzOLJEAtiN70NjL5XiXLbwFHEUwVUoGsSoQl8BBdbgvxx3m1-I3WwxWcsAsosQRGii6Nzgg0vOCKZnAgktyCwSgmcDnVc1j5_Busk8hoTCWcOB5BhiZ4fNMe78Z-tLU-jhkaNDPdDta4_lq0hlAKduzXH7uOlpRQDZ42UDMWJivMEl5iUBh6rdYSh1aBouP3TASGU_am', 'sort_order' => 1],
            ['name' => 'Siti Narhalisa, S.H., M.H.',     'role' => 'Managing Partner',  'specialty' => 'Hukum Perdata & Litigasi',    'expertise' => ['Sengketa Kontrak', 'Hukum Keluarga', 'HAKI'], 'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB_b1tTJnHDRqkpCUOyDB-35GyOi-LpBjHbqTXPF8-hjlWkF_phxC_KjBqYv4voTaiM_E3Wvq5h9VNfbsKs2Tb4krZRivtuplERzFMQeaiZrXEl5z1xx5X-Sp--0ZdkxaEKVaGW2tUa44Z0SxyQF7qSQNt0ymVyGUea1suZjvwNVeArDfGaFhGRnSgbQ-ZpisZjftBVNmHuKWtAGP07IRIppRVeqNZm0Z13H9b9nxqYTXK70eL1-CAEWSb2Sc7uxz4Dlt4bERZWfZLU', 'sort_order' => 2],
            ['name' => 'Bambang Widjojo, S.H.',           'role' => 'Senior Associate',  'specialty' => 'Hukum Properti & Real Estat', 'expertise' => ['Sertifikasi Tanah', 'Sengketa Kepemilikan', 'Pengembangan Properti'], 'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDMpekyP2nLET3iFH-gclZ9IML96D7CK3zt74DSGe6nalrox3-rVDzJKeh1uzBzB_44b1BUkkejUKnZzsD0MJTxQ54xgfDc3ylOsU4ftiOvZgRXvqUlEfEd6BTYu6PNwWh3kiLLBQer0ENUD0CNQwjlFjjAm4l3qSrA7d1rSQ6fmL-v8sYuFja5_FfO_rRPh94fV0VmP3uWxxjdG0XvC8J6jzW6TC3Cy3aXvxHN8-mOITWGYaf-2SATsHIpx7o5-5RA_EoFDkDV09pg', 'sort_order' => 3],
            ['name' => 'Prof. Dr. Maria Utami, S.H.',     'role' => 'Of Counsel',        'specialty' => 'Hukum Pidana',               'expertise' => ['Pembelaan Pidana Khusus', 'Praperadilan', 'Hukum Acara Pidana'], 'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBBlDk-Bn3CFzyXSs0o3suISQMuDijXhfuTDx8_ynMd7eFR8U7dQmzh_jxu1D5rth8X-eDyqyAv8Kf3Z6nPfEKidgtsQLg-bH58n3FIBCoA_C_DS5P-OcDNcenDkbRPCY8C324GgSy_vPcexb0zuZxTaaTMhPAQOaLhY5x4fGBWrx3W9gmm3QnIEiBQ7mDTRBka60YPHPQE5YlTq2Kd3QLj1YZdvxSlKxJWBnC208dwfz-3BBY4nn7f3_Sdhd2ysim7zcp6W2i5ETl1', 'sort_order' => 4],
            ['name' => 'Diana Putri, S.H., LL.M.',        'role' => 'Associate',         'specialty' => 'Hukum Keluarga',             'expertise' => ['Perceraian & Waris', 'Perjanjian Pra-nikah', 'Pengasuhan Anak'], 'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDu1SM7pdyNyhpzdKJAmTxV2pGvihLbVxozYdEUMDY43606aME4ggyNQiXmE3tfnZ6mzmWQytyI0HQ5NefRJLDdrgCGjcJxSd5KDIBdb7rC58lvFfpsdnEl69uA61jbAJlmawsE9kN2tIkKzHnqITtSmxvrq-ULuIUIrl_bE5W9LynaT1PO0YcxpUk8mwiVhTAibEpDeDoXHM69tneWX6Nsg61-MWuFpg1w8wdSgKJlfgPAPN_216fsCuwMUPHEZr-I5p4gUFsU5j51', 'sort_order' => 5],
            ['name' => 'Rizky Ramadhon, S.H.',            'role' => 'Associate',         'specialty' => 'Hukum Pidana & Korporasi',   'expertise' => ['Hukum Persaingan Usaha', 'Tindak Pidana Korporasi', 'Kepatuhan Regulasi'], 'photo_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC054BuIoYbOeDyF9Y-rHfAOJ7WfaKMDJ_NaoPNwH5K76dBOaTww1dQkOgqT45up38YcgncMDoRS1qFdOtNp-pomLmSnYrU6g02E1XCJa_M_w5TzV8w2jvoaQBUQ3Y8ZQAtDdR7EgMDXhD8sXBHZGlEkFGtRIf87fA5V3dWRkvr4mCUOrisG1sorkzzVULaLhgBZhiRwYcBzsCY7VIuSOOjNfVlyScr3TqD-Tm-ihL6UBRK3p7gbONu8Kfz3QoaJrIjKrIS2rKvuiJj', 'sort_order' => 6],
        ];

        foreach ($members as $m) {
            TeamMember::updateOrCreate(['name' => $m['name']], array_merge($m, ['is_active' => true]));
        }
    }

    private function seedTestimonials(): void
    {
        $testimonials = [
            ['quote' => '"MVP Law Firm membantu perusahaan kami melewati proses merger yang rumit dengan sangat lancar. Keahlian hukum korporasi mereka sungguh luar biasa."', 'author_name' => 'Andi Wijaya', 'author_role' => 'CEO, Tech Nusantara', 'sort_order' => 1],
            ['quote' => '"Dalam masa tersulit keluarga kami, tim hukum di sini memberikan bimbingan yang sangat simpatik dan profesional. Kami sangat berterima kasih."', 'author_name' => 'Maria Lestari', 'author_role' => 'Ibu Rumah Tangga', 'sort_order' => 2],
            ['quote' => '"Analisis hukum mereka sangat tajam. Saya merasa sangat terlindungi ketika berhadapan dengan sengketa properti yang kompleks."', 'author_name' => 'Hendra Kusuma', 'author_role' => 'Investor Properti', 'sort_order' => 3],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['author_name' => $t['author_name']], array_merge($t, ['is_active' => true]));
        }
    }

    private function seedMilestones(): void
    {
        $milestones = [
            ['year' => '1994', 'title' => 'Pendirian Firma',          'description' => 'MVP Law Firm berdiri di Jakarta dengan 3 advokat pendiri dan komitmen kuat pada integritas hukum.', 'sort_order' => 1],
            ['year' => '2003', 'title' => 'Ekspansi Nasional',        'description' => 'Membuka kantor cabang di Surabaya dan Medan, memperluas jangkauan layanan ke klien korporasi nasional.', 'sort_order' => 2],
            ['year' => '2010', 'title' => '500 Kasus Terselesaikan',  'description' => 'Mencapai tonggak 500 kasus berhasil diselesaikan dengan tingkat kepuasan klien di atas 97%.', 'sort_order' => 3],
            ['year' => '2018', 'title' => 'Penghargaan Internasional', 'description' => 'Menerima pengakuan dari Asian Legal Business sebagai salah satu firma hukum terbaik di Asia Tenggara.', 'sort_order' => 4],
            ['year' => '2024', 'title' => 'Era Digital & Inovasi',    'description' => 'Meluncurkan platform konsultasi hukum digital untuk memberikan akses layanan yang lebih cepat dan efisien bagi klien.', 'sort_order' => 5],
        ];

        foreach ($milestones as $m) {
            Milestone::updateOrCreate(['year' => $m['year'], 'title' => $m['title']], $m);
        }
    }

    private function seedPageContents(): void
    {
        $contents = [
            // HOME
            ['page' => 'home', 'section' => 'hero', 'key' => 'eyebrow',      'value' => 'Integritas & Keahlian',          'type' => 'text',     'label' => 'Eyebrow Label',   'sort_order' => 1],
            ['page' => 'home', 'section' => 'hero', 'key' => 'headline_1',   'value' => 'Kemitraan Hukum',               'type' => 'text',     'label' => 'Headline Baris 1','sort_order' => 2],
            ['page' => 'home', 'section' => 'hero', 'key' => 'headline_2',   'value' => 'yang Berlandaskan',             'type' => 'text',     'label' => 'Headline Baris 2','sort_order' => 3],
            ['page' => 'home', 'section' => 'hero', 'key' => 'headline_3',   'value' => 'Kepercayaan',                   'type' => 'text',     'label' => 'Headline Baris 3','sort_order' => 4],
            ['page' => 'home', 'section' => 'hero', 'key' => 'subheadline',  'value' => 'Memberikan solusi hukum yang komprehensif dan profesional untuk kebutuhan pribadi maupun korporasi Anda. Kepercayaan Anda adalah prioritas utama kami.', 'type' => 'textarea', 'label' => 'Sub-headline', 'sort_order' => 5],
            ['page' => 'home', 'section' => 'hero', 'key' => 'btn_primary',  'value' => 'Konsultasi Sekarang',           'type' => 'text',     'label' => 'Tombol Utama',    'sort_order' => 6],
            ['page' => 'home', 'section' => 'hero', 'key' => 'btn_secondary','value' => 'Lihat Layanan',                 'type' => 'text',     'label' => 'Tombol Sekunder', 'sort_order' => 7],

            ['page' => 'home', 'section' => 'services', 'key' => 'eyebrow',  'value' => 'Keahlian Kami',                 'type' => 'text',     'label' => 'Eyebrow',         'sort_order' => 1],
            ['page' => 'home', 'section' => 'services', 'key' => 'headline', 'value' => 'Layanan Hukum Profesional',     'type' => 'text',     'label' => 'Headline',        'sort_order' => 2],

            ['page' => 'home', 'section' => 'about', 'key' => 'eyebrow',     'value' => 'Tentang Kami',                  'type' => 'text',     'label' => 'Eyebrow',         'sort_order' => 1],
            ['page' => 'home', 'section' => 'about', 'key' => 'headline',    'value' => 'Melindungi Hak Anda dengan Integritas', 'type' => 'text', 'label' => 'Headline',    'sort_order' => 2],
            ['page' => 'home', 'section' => 'about', 'key' => 'body',        'value' => 'MVP Law Firm didirikan dengan satu visi sederhana: menyediakan layanan hukum berkualitas tinggi dengan pendekatan yang sangat personal. Kami percaya bahwa setiap kasus unik dan membutuhkan strategi yang dirancang khusus.', 'type' => 'textarea', 'label' => 'Paragraf', 'sort_order' => 3],

            ['page' => 'home', 'section' => 'team', 'key' => 'eyebrow',      'value' => 'Pakar Kami',                    'type' => 'text',     'label' => 'Eyebrow',         'sort_order' => 1],
            ['page' => 'home', 'section' => 'team', 'key' => 'headline',     'value' => 'Tim Advokat Profesional',       'type' => 'text',     'label' => 'Headline',        'sort_order' => 2],

            ['page' => 'home', 'section' => 'testimonials', 'key' => 'eyebrow',  'value' => 'Pengalaman Klien',          'type' => 'text',     'label' => 'Eyebrow',         'sort_order' => 1],
            ['page' => 'home', 'section' => 'testimonials', 'key' => 'headline', 'value' => 'Apa Kata Klien Kami',       'type' => 'text',     'label' => 'Headline',        'sort_order' => 2],

            ['page' => 'home', 'section' => 'contact', 'key' => 'eyebrow',   'value' => 'Hubungi Kami',                  'type' => 'text',     'label' => 'Eyebrow',         'sort_order' => 1],
            ['page' => 'home', 'section' => 'contact', 'key' => 'headline',  'value' => 'Konsultasi Hukum Dimulai di Sini', 'type' => 'text',  'label' => 'Headline',        'sort_order' => 2],

            // TENTANG
            ['page' => 'tentang', 'section' => 'story', 'key' => 'eyebrow',  'value' => 'Warisan Keadilan',              'type' => 'text',     'label' => 'Eyebrow',         'sort_order' => 1],
            ['page' => 'tentang', 'section' => 'story', 'key' => 'headline', 'value' => 'Warisan Keadilan dan Dedikasi Sejak 1994', 'type' => 'text', 'label' => 'Headline', 'sort_order' => 2],
            ['page' => 'tentang', 'section' => 'story', 'key' => 'para_1',   'value' => 'Didirikan dengan visi untuk mentransformasi lanskap layanan hukum di Indonesia, MVP Law Firm telah tumbuh menjadi salah satu firma hukum paling dipercaya di Indonesia selama lebih dari tiga dekade.', 'type' => 'textarea', 'label' => 'Paragraf 1', 'sort_order' => 3],
            ['page' => 'tentang', 'section' => 'story', 'key' => 'para_2',   'value' => 'Perjalanan kami dimulai dengan satu prinsip sederhana namun kuat: bahwa setiap klien berhak mendapatkan representasi hukum terbaik, terlepas dari kompleksitas kasusnya.', 'type' => 'textarea', 'label' => 'Paragraf 2', 'sort_order' => 4],
            ['page' => 'tentang', 'section' => 'mission', 'key' => 'quote',  'value' => '"Memberikan solusi hukum yang cerdas, strategis, dan etis, guna memastikan kesuksesan jangka panjang dan ketenangan pikiran bagi setiap klien yang kami layani."', 'type' => 'textarea', 'label' => 'Kutipan Visi', 'sort_order' => 1],
        ];

        foreach ($contents as $c) {
            PageContent::updateOrCreate(
                ['page' => $c['page'], 'section' => $c['section'], 'key' => $c['key']],
                $c
            );
        }
    }
}
