@extends('layouts.admin')

@section('title', $mode === 'create' ? 'Tambah Layanan' : 'Edit Layanan')
@section('page_title', $mode === 'create' ? 'Tambah Layanan Baru' : 'Edit Layanan')
@section('page_subtitle', 'Masukkan informasi dasar, ikon, deskripsi, dan sub-item layanan')

@section('content')
<div class="card max-w-3xl">
    <form action="{{ $mode === 'create' ? route('admin.services.store') : route('admin.services.update', $service) }}" method="POST" class="space-y-6">
        @csrf
        @if($mode === 'edit')
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label" for="title">Nama Layanan</label>
                <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required class="form-input">
            </div>

            <div>
                <label class="form-label" for="icon">Ikon (Iconify Class)</label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon ?? 'solar:balance-linear') }}" required class="form-input">
            </div>
        </div>

        <div>
            <label class="form-label" for="description">Deskripsi Singkat</label>
            <textarea id="description" name="description" rows="4" required class="form-input">{{ old('description', $service->description) }}</textarea>
        </div>

        <div>
            <label class="form-label">Sub-Item (Fitur / Cakupan Hukum)</label>
            <div id="items-container" class="space-y-3">
                @php
                    $items = old('items', $service->items ?? ['', '', '', '']);
                @endphp
                @foreach($items as $i => $item)
                <div class="flex gap-2">
                    <input type="text" name="items[]" value="{{ $item }}" placeholder="Masukkan poin cakupan..." class="form-input">
                    @if($i > 0)
                    <button type="button" onclick="this.parentElement.remove()" class="px-3 border border-red-200 text-red-500 rounded-xl hover:bg-red-50">
                        Hapus
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addItemField()" class="mt-3 inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary">
                + Tambah Baris
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
            <div>
                <label class="form-label" for="sort_order">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" required class="form-input">
            </div>

            <div>
                <span class="form-label">Status</span>
                <label class="inline-flex items-center mt-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-secondary focus:ring-secondary">
                    <span class="ml-2 text-sm text-gray-700 font-medium">Aktif (Tampilkan di Website)</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.services.index') }}" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Layanan</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function addItemField() {
        const container = document.getElementById('items-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="items[]" placeholder="Masukkan poin cakupan..." class="form-input">
            <button type="button" onclick="this.parentElement.remove()" class="px-3 border border-red-200 text-red-500 rounded-xl hover:bg-red-50">
                Hapus
            </button>
        `;
        container.appendChild(div);
    }
</script>
@endsection
