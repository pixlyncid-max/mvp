@extends('layouts.admin')

@section('title', 'Layanan')
@section('page_title', 'Daftar Layanan Hukum')
@section('page_subtitle', 'Kelola kartu layanan hukum, deskripsi, dan sub-item')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.services.create') }}" class="btn-primary">
        <iconify-icon icon="solar:add-circle-linear" class="text-lg"></iconify-icon>
        Tambah Layanan Baru
    </a>
</div>

<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">
                    <th class="px-6 py-4">Urutan</th>
                    <th class="px-6 py-4">Ikon</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($services as $s)
                <tr>
                    <td class="px-6 py-4 font-mono text-gray-400">{{ $s->sort_order }}</td>
                    <td class="px-6 py-4">
                        <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
                            <iconify-icon icon="{{ $s->icon }}" class="text-xl"></iconify-icon>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-semibold text-primary">{{ $s->title }}</td>
                    <td class="px-6 py-4 max-w-xs truncate">{{ $s->description }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.services.toggle', $s) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $s->is_active ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-50 text-gray-400 border border-gray-200' }}">
                                {{ $s->is_active ? 'Aktif' : 'Non-aktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.services.edit', $s) }}" class="btn-secondary py-1.5 px-3">
                                Edit
                            </a>
                            <form action="{{ route('admin.services.destroy', $s) }}" method="POST" onsubmit="return confirm('Hapus layanan ini?')">
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
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada layanan hukum terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
