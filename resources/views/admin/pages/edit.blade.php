@extends('layouts.admin')

@section('title', 'Edit Konten ' . $pageLabel)
@section('page_title', 'Edit Konten ' . $pageLabel)
@section('page_subtitle', 'Sesuaikan teks statis per-section pada halaman ' . $pageLabel)

@section('content')
<div class="card">
    <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        @foreach($contents as $section => $items)
        <div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0">
            <h2 class="text-sm font-bold text-primary uppercase tracking-wider mb-6">Section: {{ strtoupper($section) }}</h2>

            <div class="grid grid-cols-1 gap-6 max-w-3xl">
                @foreach($items as $c)
                <div>
                    <label class="form-label" for="content_{{ $c->id }}">{{ $c->label }}</label>
                    @if($c->type === 'textarea' || $c->type === 'html')
                        <textarea id="content_{{ $c->id }}" name="{{ $c->id }}" rows="4" class="form-input">{{ $c->value }}</textarea>
                    @else
                        <input type="text" id="content_{{ $c->id }}" name="{{ $c->id }}" value="{{ $c->value }}" class="form-input">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.pages.index') }}" class="btn-secondary">Kembali</a>
            <button type="submit" class="btn-primary">Simpan Konten Halaman</button>
        </div>
    </form>
</div>
@endsection
