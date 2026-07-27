@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan data dan konten sistem MVP Law Firm')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Card 1 -->
    <div class="card flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Layanan Hukum</p>
            <p class="text-3xl font-bold text-primary mt-1">{{ $stats['services'] }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary">
            <iconify-icon icon="solar:balance-linear" class="text-2xl"></iconify-icon>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="card flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tim Advokat</p>
            <p class="text-3xl font-bold text-primary mt-1">{{ $stats['team'] }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary">
            <iconify-icon icon="solar:users-group-rounded-linear" class="text-2xl"></iconify-icon>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="card flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Testimonial</p>
            <p class="text-3xl font-bold text-primary mt-1">{{ $stats['testimonials'] }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary">
            <iconify-icon icon="solar:chat-round-line-linear" class="text-2xl"></iconify-icon>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="card flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Milestones</p>
            <p class="text-3xl font-bold text-primary mt-1">{{ $stats['milestones'] }}</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary">
            <iconify-icon icon="solar:timeline-linear" class="text-2xl"></iconify-icon>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-3xl border border-gray-100 p-8">
    <h2 class="text-lg font-bold text-primary mb-2">Selamat datang di CMS MVP Law Firm</h2>
    <p class="text-sm text-gray-500 leading-relaxed max-w-3xl">
        Gunakan menu navigasi di sebelah kiri untuk mengubah pengaturan situs, mengelola layanan hukum yang ditawarkan, menambahkan tim advokat, mengelola testimoni dari klien, serta menyesuaikan teks statis yang tampil di beranda dan halaman tentang kami.
    </p>
</div>
@endsection
