@extends('layouts.admin')

@section('title', 'Testimonial')
@section('page_title', 'Testimonial Klien')
@section('page_subtitle', 'Kelola testimoni dan kutipan kepuasan klien')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">
        <iconify-icon icon="solar:add-circle-linear" class="text-lg"></iconify-icon>
        Tambah Testimonial
    </a>
</div>

<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-400 uppercase tracking-widest">
                    <th class="px-6 py-4">Kutipan</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Pekerjaan / Jabatan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($testimonials as $t)
                <tr>
                    <td class="px-6 py-4 max-w-xs truncate italic">"{{ $t->quote }}"</td>
                    <td class="px-6 py-4 font-semibold text-primary">{{ $t->author_name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $t->author_role }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $t->is_active ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-50 text-gray-400 border border-gray-200' }}">
                            {{ $t->is_active ? 'Aktif' : 'Non-aktif' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn-secondary py-1.5 px-3">
                                Edit
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus testimonial ini?')">
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
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">Belum ada testimonial terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
