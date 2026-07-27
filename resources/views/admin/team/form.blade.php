@extends('layouts.admin')

@section('title', $mode === 'create' ? 'Tambah Anggota Tim' : 'Edit Anggota Tim')
@section('page_title', $mode === 'create' ? 'Tambah Anggota Tim' : 'Edit Anggota Tim')
@section('page_subtitle', 'Masukkan informasi profil, jabatan, keahlian, dan URL foto advokat')

@section('content')
<div class="card max-w-3xl">
    <form action="{{ $mode === 'create' ? route('admin.team.store') : route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if($mode === 'edit')
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label" for="name">Nama Lengkap & Gelar</label>
                <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" required class="form-input">
            </div>

            <div>
                <label class="form-label" for="role">Jabatan (e.g. Senior Partner)</label>
                <input type="text" id="role" name="role" value="{{ old('role', $member->role) }}" required class="form-input">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label" for="specialty">Spesialisasi Hukum</label>
                <input type="text" id="specialty" name="specialty" value="{{ old('specialty', $member->specialty) }}" required class="form-input">
            </div>

            <div>
                <label class="form-label" for="photo">Foto Profil (Pilih dari Komputer)</label>
                <div class="flex items-center gap-4">
                    @if($member->photo_url)
                        <img src="{{ $member->photo_url }}" alt="Preview" class="w-10 h-12 object-cover rounded-lg border border-gray-200">
                    @endif
                    <div class="flex-1">
                        <input type="file" id="photo" name="photo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10 transition-colors">
                        <input type="hidden" name="photo_url" value="{{ old('photo_url', $member->photo_url) }}">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label class="form-label">Keahlian Spesifik</label>
            <div id="expertise-container" class="space-y-3">
                @php
                    $expertise = old('expertise', $member->expertise ?? ['', '', '']);
                @endphp
                @foreach($expertise as $i => $exp)
                <div class="flex gap-2">
                    <input type="text" name="expertise[]" value="{{ $exp }}" placeholder="e.g. Merger & Akuisisi" class="form-input">
                    @if($i > 0)
                    <button type="button" onclick="this.parentElement.remove()" class="px-3 border border-red-200 text-red-500 rounded-xl hover:bg-red-50">
                        Hapus
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addExpertiseField()" class="mt-3 inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary">
                + Tambah Baris
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
            <div>
                <label class="form-label" for="sort_order">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $member->sort_order ?? 0) }}" required class="form-input">
            </div>

            <div>
                <span class="form-label">Status</span>
                <label class="inline-flex items-center mt-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-secondary focus:ring-secondary">
                    <span class="ml-2 text-sm text-gray-700 font-medium">Aktif (Tampilkan di Website)</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.team.index') }}" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Profil</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function addExpertiseField() {
        const container = document.getElementById('expertise-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="expertise[]" placeholder="e.g. Merger & Akuisisi" class="form-input">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 border border-red-200 text-red-500 rounded-xl hover:bg-red-50">
                Hapus
            </button>
        `;
        container.appendChild(div);
    }
</script>
@endsection
