@extends('layouts.admin')

@section('title', $mode === 'create' ? 'Tambah Testimonial' : 'Edit Testimonial')
@section('page_title', $mode === 'create' ? 'Tambah Testimonial' : 'Edit Testimonial')
@section('page_subtitle', 'Masukkan kutipan kepuasan klien dan informasi profilnya')

@section('content')
<div class="card max-w-3xl">
    <form action="{{ $mode === 'create' ? route('admin.testimonials.store') : route('admin.testimonials.update', $testimonial) }}" method="POST" class="space-y-6">
        @csrf
        @if($mode === 'edit')
            @method('PUT')
        @endif

        <div>
            <label class="form-label" for="quote">Kutipan / Testimoni</label>
            <textarea id="quote" name="quote" rows="4" required placeholder="Tulis kutipan di sini..." class="form-input">{{ old('quote', $testimonial->quote) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label" for="author_name">Nama Klien</label>
                <input type="text" id="author_name" name="author_name" value="{{ old('author_name', $testimonial->author_name) }}" required class="form-input">
            </div>

            <div>
                <label class="form-label" for="author_role">Jabatan / Perusahaan (e.g. CEO, Tech Corp)</label>
                <input type="text" id="author_role" name="author_role" value="{{ old('author_role', $testimonial->author_role) }}" required class="form-input">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
            <div>
                <label class="form-label" for="sort_order">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" required class="form-input">
            </div>

            <div>
                <span class="form-label">Status</span>
                <label class="inline-flex items-center mt-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-secondary focus:ring-secondary">
                    <span class="ml-2 text-sm text-gray-700 font-medium">Aktif (Tampilkan di Website)</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Testimonial</button>
        </div>
    </form>
</div>
@endsection
