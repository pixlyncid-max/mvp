@extends('layouts.admin')

@section('title', 'Konten Halaman')
@section('page_title', 'Kelola Konten Halaman')
@section('page_subtitle', 'Pilih halaman yang ingin Anda edit teks statis dan kontennya')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($pages as $slug => $label)
    <div class="card flex flex-col justify-between h-48 hover:shadow-md transition-shadow">
        <div>
            <div class="w-12 h-12 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary mb-4">
                <iconify-icon icon="solar:document-text-linear" class="text-2xl"></iconify-icon>
            </div>
            <h2 class="text-lg font-bold text-primary">{{ $label }}</h2>
            <p class="text-xs text-gray-400 mt-1">Kelola teks hero, subheadline, eyebrow, dll.</p>
        </div>

        <div class="mt-4 text-right">
            <a href="{{ route('admin.pages.edit', $slug) }}" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary">
                Edit Konten <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
