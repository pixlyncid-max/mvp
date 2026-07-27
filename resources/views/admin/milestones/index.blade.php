@extends('layouts.admin')

@section('title', 'Milestone')
@section('page_title', 'Milestone Sejarah')
@section('page_subtitle', 'Kelola data timeline sejarah dan pencapaian firma hukum')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.milestones.create') }}" class="btn-primary">
        <iconify-icon icon="solar:add-circle-linear" class="text-lg"></iconify-icon>
        Tambah Milestone
    </a>
</div>

<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">
                    <th class="px-6 py-4">Tahun</th>
                    <th class="px-6 py-4">Judul Pencapaian</th>
                    <th class="px-6 py-4">Deskripsi Sejarah</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($milestones as $m)
                <tr>
                    <td class="px-6 py-4 font-mono font-bold text-secondary">{{ $m->year }}</td>
                    <td class="px-6 py-4 font-semibold text-primary">{{ $m->title }}</td>
                    <td class="px-6 py-4 max-w-xs truncate">{{ $m->description }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.milestones.edit', $m) }}" class="btn-secondary py-1.5 px-3">
                                Edit
                            </a>
                            <form action="{{ route('admin.milestones.destroy', $m) }}" method="POST" onsubmit="return confirm('Hapus milestone ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger py-1.5 px-3">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada milestone terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
