@extends('layouts.admin')

@section('title', 'Tim Advokat')
@section('page_title', 'Tim Advokat')
@section('page_subtitle', 'Kelola anggota advokat, spesialisasi, dan bidang keahlian')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.team.create') }}" class="btn-primary">
        <iconify-icon icon="solar:add-circle-linear" class="text-lg"></iconify-icon>
        Tambah Anggota Tim
    </a>
</div>

<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">
                    <th class="px-6 py-4">Foto</th>
                    <th class="px-6 py-4">Nama Lengkap</th>
                    <th class="px-6 py-4">Jabatan</th>
                    <th class="px-6 py-4">Spesialisasi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($members as $m)
                <tr>
                    <td class="px-6 py-4">
                        <img src="{{ $m->photo_url }}" alt="{{ $m->name }}" class="w-10 h-12 object-cover rounded-lg border border-gray-100">
                    </td>
                    <td class="px-6 py-4 font-semibold text-primary">{{ $m->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $m->role }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $m->specialty }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $m->is_active ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-50 text-gray-400 border border-gray-200' }}">
                            {{ $m->is_active ? 'Aktif' : 'Non-aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end items-center gap-2">
                            <a href="{{ route('tim.detail', $m->slug ?: $m->id) }}" target="_blank" class="btn-secondary py-1.5 px-3 flex items-center gap-1 text-xs" title="Lihat Halaman Publik">
                                <iconify-icon icon="solar:eye-linear"></iconify-icon>
                                Lihat
                            </a>
                            <a href="{{ route('admin.team.edit', $m) }}" class="btn-secondary py-1.5 px-3">
                                Edit
                            </a>
                            <form action="{{ route('admin.team.destroy', $m) }}" method="POST" onsubmit="return confirm('Hapus anggota tim ini?')">
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
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada anggota tim terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
