@extends('layouts.admin')

@section('title', $mode === 'create' ? 'Tambah Milestone' : 'Edit Milestone')
@section('page_title', $mode === 'create' ? 'Tambah Milestone' : 'Edit Milestone')
@section('page_subtitle', 'Masukkan tahun, judul pencapaian, dan deskripsi sejarah detail')

@section('content')
<div class="card max-w-3xl">
    <form action="{{ $mode === 'create' ? route('admin.milestones.store') : route('admin.milestones.update', $milestone) }}" method="POST" class="space-y-6">
        @csrf
        @if($mode === 'edit')
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="form-label" for="year">Tahun</label>
                <input type="text" id="year" name="year" value="{{ old('year', $milestone->year) }}" placeholder="e.g. 1994" required class="form-input">
            </div>

            <div>
                <label class="form-label" for="title">Judul Milestone</label>
                <input type="text" id="title" name="title" value="{{ old('title', $milestone->title) }}" required class="form-input">
            </div>
        </div>

        <div>
            <label class="form-label" for="description">Deskripsi Detail</label>
            <textarea id="description" name="description" rows="5" required class="form-input">{{ old('description', $milestone->description) }}</textarea>
        </div>

        <div>
            <label class="form-label" for="sort_order">Urutan Tampilan</label>
            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $milestone->sort_order ?? 0) }}" required class="form-input">
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.milestones.index') }}" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan Milestone</button>
        </div>
    </form>
</div>
@endsection
