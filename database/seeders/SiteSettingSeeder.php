<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name',        'value' => 'MVP Law Firm',                                     'group' => 'general', 'type' => 'text',     'label' => 'Nama Firma'],
            ['key' => 'site_tagline',     'value' => 'Melindungi Hak Anda dengan Integritas',            'group' => 'general', 'type' => 'text',     'label' => 'Tagline'],
            ['key' => 'site_description', 'value' => 'Kemitraan hukum yang berlandaskan kepercayaan.',  'group' => 'general', 'type' => 'textarea', 'label' => 'Deskripsi Singkat'],
            ['key' => 'years_experience', 'value' => '20',                                               'group' => 'general', 'type' => 'text',     'label' => 'Tahun Pengalaman'],
            ['key' => 'cases_completed',  'value' => '500',                                              'group' => 'general', 'type' => 'text',     'label' => 'Kasus Selesai'],
            ['key' => 'client_satisfaction','value'=> '98',                                              'group' => 'general', 'type' => 'text',     'label' => 'Kepuasan Klien (%)'],
            ['key' => 'lawyers_count',    'value' => '15',                                               'group' => 'general', 'type' => 'text',     'label' => 'Jumlah Advokat'],
            ['key' => 'founded_year',     'value' => '1994',                                             'group' => 'general', 'type' => 'text',     'label' => 'Tahun Berdiri'],

            // Contact
            ['key' => 'address',          'value' => 'Prosperity Tower, SCBD, Jl. Jendral Sudirman Kav. 1, Jakarta Selatan, 12190', 'group' => 'contact', 'type' => 'textarea', 'label' => 'Alamat Kantor'],
            ['key' => 'phone',            'value' => '+62 21 5550 1234',                                 'group' => 'contact', 'type' => 'tel',      'label' => 'Telepon'],
            ['key' => 'whatsapp',         'value' => '+62811900800',                                     'group' => 'contact', 'type' => 'tel',      'label' => 'WhatsApp'],
            ['key' => 'email',            'value' => 'info@mvplaw.id',                                   'group' => 'contact', 'type' => 'email',    'label' => 'Email Umum'],
            ['key' => 'email_consult',    'value' => 'consult@mvplaw.id',                                'group' => 'contact', 'type' => 'email',    'label' => 'Email Konsultasi'],
            ['key' => 'office_hours',     'value' => 'Senin – Jumat: 08:00 – 18:00 WIB',                'group' => 'contact', 'type' => 'text',     'label' => 'Jam Operasional'],
            ['key' => 'maps_embed_url',   'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0616239700255!2d106.81721117411944!3d-6.224305760802566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e4a8d8ae4d%3A0x77c0a3a63f6b87bc!2sSCBD%2C%20Jakarta%20Selatan!5e0!3m2!1sid!2sid!4v1700000000000', 'group' => 'contact', 'type' => 'url', 'label' => 'URL Google Maps Embed'],

            // Social
            ['key' => 'social_instagram', 'value' => '#',                                                'group' => 'social',  'type' => 'url',      'label' => 'Instagram'],
            ['key' => 'social_tiktok',    'value' => '#',                                                'group' => 'social',  'type' => 'url',      'label' => 'TikTok'],
            ['key' => 'social_facebook',  'value' => '#',                                                'group' => 'social',  'type' => 'url',      'label' => 'Facebook'],

            // SEO
            ['key' => 'meta_home',        'value' => 'Kemitraan hukum yang berlandaskan kepercayaan. MVP Law Firm memberikan solusi hukum komprehensif untuk kebutuhan pribadi dan korporasi Anda.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Meta Deskripsi — Beranda'],
            ['key' => 'meta_layanan',     'value' => 'Layanan hukum profesional dari MVP Law Firm: Hukum Perdata, Pidana, Korporat, Keluarga, Properti, dan HAKI.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Meta Deskripsi — Layanan'],
            ['key' => 'meta_tentang',     'value' => 'Berdiri sejak 1994, MVP Law Firm adalah firma hukum terkemuka di Indonesia yang berkomitmen pada integritas.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Meta Deskripsi — Tentang'],
            ['key' => 'meta_tim',         'value' => 'Kenali tim advokat profesional MVP Law Firm yang berdedikasi melindungi hak dan kepentingan Anda.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Meta Deskripsi — Tim'],
            ['key' => 'meta_kontak',      'value' => 'Hubungi MVP Law Firm untuk konsultasi hukum. Kantor kami berlokasi di SCBD, Jakarta Selatan.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Meta Deskripsi — Kontak'],

            // Dashboard Klien (Mockup)
            ['key' => 'mockup_badge',            'value' => 'Sedang Berjalan',                  'group' => 'dashboard klien', 'type' => 'text', 'label' => 'Status Kasus (Badge)'],
            ['key' => 'mockup_doc_1',            'value' => 'Draft Kontrak Selesai',            'group' => 'dashboard klien', 'type' => 'text', 'label' => 'Status Dokumen 1'],
            ['key' => 'mockup_doc_2',            'value' => 'Review Notaris',                   'group' => 'dashboard klien', 'type' => 'text', 'label' => 'Status Dokumen 2'],
            ['key' => 'mockup_doc_3',            'value' => 'Penandatanganan',                  'group' => 'dashboard klien', 'type' => 'text', 'label' => 'Status Dokumen 3'],
            ['key' => 'mockup_hearing_date',     'value' => '14 Des',                           'group' => 'dashboard klien', 'type' => 'text', 'label' => 'Jadwal Sidang - Tanggal'],
            ['key' => 'mockup_hearing_location', 'value' => 'Pengadilan Negeri Jakarta Pusat',  'group' => 'dashboard klien', 'type' => 'text', 'label' => 'Jadwal Sidang - Lokasi'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
