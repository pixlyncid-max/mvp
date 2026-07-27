@extends('layouts.admin')

@section('title', 'Pengaturan')
@section('page_title', 'Pengaturan Situs')
@section('page_subtitle', 'Kelola informasi dasar, kontak, sosial media, dan SEO')

@section('content')
<div class="card">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        @foreach($settings as $group => $items)
        <div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0">
            <h2 class="text-sm font-bold text-primary uppercase tracking-wider mb-6">{{ strtoupper($group) }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($items as $s)
                <div>
                    <label class="form-label" for="{{ $s['key'] }}">{{ $s['label'] }}</label>
                    @if($s['type'] === 'textarea')
                        <textarea id="{{ $s['key'] }}" name="{{ $s['key'] }}" rows="3" class="form-input">{{ $s['value'] }}</textarea>
                    @else
                        <input type="{{ $s['type'] }}" id="{{ $s['key'] }}" name="{{ $s['key'] }}" value="{{ $s['value'] }}" class="form-input">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="flex justify-end pt-4">
            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
