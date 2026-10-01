@extends('layouts.admin')

@section('title', $mode === 'create' ? 'Tambah Anggota Tim' : 'Edit Anggota Tim')
@section('page_title', $mode === 'create' ? 'Tambah Anggota Tim' : 'Edit Anggota Tim')
@section('page_subtitle', 'Kelola informasi profil, detail karier, pendidikan, keahlian, dan kontak advokat')

@section('content')
<div class="card max-w-4xl mx-auto">
    <form action="{{ $mode === 'create' ? route('admin.team.store') : route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @if($mode === 'edit')
            @method('PUT')
        @endif

        <!-- 1. INFORMASI UTAMA -->
        <div>
            <h3 class="text-base font-bold text-primary mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                Informasi Utama
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="form-label" for="name">Nama Lengkap &amp; Gelar <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" required class="form-input" placeholder="e.g. Muhammad Verdad Wafiudin, S.H.">
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="form-label" for="role">Jabatan (e.g. Managing Partner) <span class="text-red-500">*</span></label>
                    <input type="text" id="role" name="role" value="{{ old('role', $member->role) }}" required class="form-input" placeholder="e.g. Managing Partner / Senior Partner">
                    @error('role') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="form-label" for="category">Kategori Tim <span class="text-red-500">*</span></label>
                    <select id="category" name="category" class="form-input">
                        <option value="partner" {{ old('category', $member->category_slug ?? 'partner') === 'partner' ? 'selected' : '' }}>PARTNER</option>
                        <option value="associate" {{ old('category', $member->category_slug ?? '') === 'associate' ? 'selected' : '' }}>ASSOCIATE</option>
                        <option value="support" {{ old('category', $member->category_slug ?? '') === 'support' ? 'selected' : '' }}>SUPPORT</option>
                    </select>
                    @error('category') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="form-label" for="specialty">Spesialisasi Hukum <span class="text-red-500">*</span></label>
                    <input type="text" id="specialty" name="specialty" value="{{ old('specialty', $member->specialty) }}" required class="form-input" placeholder="e.g. Hukum Korporasi dan Bisnis">
                    @error('specialty') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="form-label" for="slug">Custom URL Slug (Opsional)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $member->slug) }}" class="form-input" placeholder="e.g. muhammad-verdad-wafiudin-sh">
                    <p class="text-[11px] text-gray-400 mt-1">Biarkan kosong untuk membuat slug otomatis dari nama.</p>
                    @error('slug') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- 2. FOTO PROFIL & KONTAK -->
        <div>
            <h3 class="text-base font-bold text-primary mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                Foto Profil &amp; Kontak Advokat
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="md:col-span-2">
                    <label class="form-label" for="photo">Foto Profil (Pilih dari Komputer)</label>
                    <div class="flex items-center gap-4 bg-gray-50/50 p-4 rounded-2xl border border-dashed border-gray-200">
                        @if($member->photo_url)
                            <img src="{{ $member->photo_url }}" alt="Preview" class="w-16 h-20 object-cover rounded-xl border border-gray-200 shadow-sm">
                        @endif
                        <div class="flex-1">
                            <input type="file" id="photo" name="photo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90 transition-colors">
                            <input type="hidden" name="photo_url" value="{{ old('photo_url', $member->photo_url) }}">
                            <p class="text-[11px] text-gray-400 mt-1.5">Format JPG, PNG, WEBP (Maks. 5MB). Dianjurkan foto portrait proporsi 4:5.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="form-label" for="email">Email Kontak Advokat</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $member->email) }}" class="form-input" placeholder="e.g. verdad@mvplaw.co.id">
                </div>

                <div>
                    <label class="form-label" for="phone">Nomor Telepon / WhatsApp</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" class="form-input" placeholder="e.g. +62 812-3456-7890">
                </div>

                <div class="md:col-span-2">
                    <label class="form-label" for="linkedin">Link LinkedIn Profile (Opsional)</label>
                    <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $member->linkedin) }}" class="form-input" placeholder="e.g. https://www.linkedin.com/in/username">
                </div>
            </div>
        </div>

        <!-- 3. BIOGRAFI / PROFIL LENGKAP -->
        <div>
            <h3 class="text-base font-bold text-primary mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                Biografi / Ringkasan Profil
            </h3>
            <div>
                <label class="form-label" for="bio">Ringkasan &amp; Latar Belakang Advokat</label>
                <textarea id="bio" name="bio" rows="5" class="form-input leading-relaxed" placeholder="Tuliskan gambaran umum perjalanan karier, dedikasi hukum, dan fokus penanganan perkara advokat di sini...">{{ old('bio', $member->bio) }}</textarea>
                <p class="text-[11px] text-gray-400 mt-1">Biografi ini akan ditampilkan di halaman detail profil advokat.</p>
            </div>
        </div>

        <!-- 4. KEAHLIAN SPESIFIK -->
        <div>
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-base font-bold text-primary flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    Keahlian Spesifik
                </h3>
                <button type="button" onclick="addListField('expertise-container', 'expertise[]', 'e.g. Korporasi dan Tata Kelola Perusahaan')" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary hover:text-secondary/80">
                    + Tambah Baris
                </button>
            </div>
            <div id="expertise-container" class="space-y-3">
                @php
                    $expertise = old('expertise', $member->expertise ?? ['']);
                    if (empty($expertise)) $expertise = [''];
                @endphp
                @foreach($expertise as $i => $exp)
                <div class="flex gap-2">
                    <input type="text" name="expertise[]" value="{{ $exp }}" placeholder="e.g. Korporasi dan Tata Kelola Perusahaan" class="form-input">
                    @if(count($expertise) > 1 || $i > 0)
                    <button type="button" onclick="this.parentElement.remove()" class="px-4 border border-red-200 text-red-500 rounded-xl hover:bg-red-50 text-sm font-medium transition-colors">
                        Hapus
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <!-- 5. RIWAYAT PENDIDIKAN -->
        <div>
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-base font-bold text-primary flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    Riwayat Pendidikan
                </h3>
                <button type="button" onclick="addListField('education-container', 'education[]', 'e.g. Sarjana Hukum (S.H.) — Universitas Indonesia')" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary hover:text-secondary/80">
                    + Tambah Baris
                </button>
            </div>
            <div id="education-container" class="space-y-3">
                @php
                    $education = old('education', $member->education ?? ['']);
                    if (empty($education)) $education = [''];
                @endphp
                @foreach($education as $i => $edu)
                <div class="flex gap-2">
                    <input type="text" name="education[]" value="{{ $edu }}" placeholder="e.g. Sarjana Hukum (S.H.) — Universitas Indonesia" class="form-input">
                    @if(count($education) > 1 || $i > 0)
                    <button type="button" onclick="this.parentElement.remove()" class="px-4 border border-red-200 text-red-500 rounded-xl hover:bg-red-50 text-sm font-medium transition-colors">
                        Hapus
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <!-- 6. PENGALAMAN & REKAM JEJAK -->
        <div>
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-base font-bold text-primary flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    Pengalaman &amp; Rekam Jejak
                </h3>
                <button type="button" onclick="addListField('experience-container', 'experience[]', 'e.g. Menangani restrukturisasi utang korporasi senilai ratusan miliar')" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary hover:text-secondary/80">
                    + Tambah Baris
                </button>
            </div>
            <div id="experience-container" class="space-y-3">
                @php
                    $experience = old('experience', $member->experience ?? ['']);
                    if (empty($experience)) $experience = [''];
                @endphp
                @foreach($experience as $i => $expItem)
                <div class="flex gap-2">
                    <input type="text" name="experience[]" value="{{ $expItem }}" placeholder="e.g. Menangani restrukturisasi utang korporasi dan sengketa komersial" class="form-input">
                    @if(count($experience) > 1 || $i > 0)
                    <button type="button" onclick="this.parentElement.remove()" class="px-4 border border-red-200 text-red-500 rounded-xl hover:bg-red-50 text-sm font-medium transition-colors">
                        Hapus
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <!-- 7. LISENSI & KEANGGOTAAN PROFESIONAL -->
        <div>
            <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
                <h3 class="text-base font-bold text-primary flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    Sertifikasi, Lisensi &amp; Keanggotaan
                </h3>
                <button type="button" onclick="addListField('achievements-container', 'achievements[]', 'e.g. Anggota Perhimpunan Advokat Indonesia (PERADI)')" class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-secondary hover:text-secondary/80">
                    + Tambah Baris
                </button>
            </div>
            <div id="achievements-container" class="space-y-3">
                @php
                    $achievements = old('achievements', $member->achievements ?? ['']);
                    if (empty($achievements)) $achievements = [''];
                @endphp
                @foreach($achievements as $i => $ach)
                <div class="flex gap-2">
                    <input type="text" name="achievements[]" value="{{ $ach }}" placeholder="e.g. Anggota Perhimpunan Advokat Indonesia (PERADI)" class="form-input">
                    @if(count($achievements) > 1 || $i > 0)
                    <button type="button" onclick="this.parentElement.remove()" class="px-4 border border-red-200 text-red-500 rounded-xl hover:bg-red-50 text-sm font-medium transition-colors">
                        Hapus
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <!-- 8. URUTAN & STATUS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
            <div>
                <label class="form-label" for="sort_order">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $member->sort_order ?? 0) }}" required class="form-input">
            </div>

            <div>
                <span class="form-label">Status</span>
                <label class="inline-flex items-center mt-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-secondary focus:ring-secondary w-5 h-5">
                    <span class="ml-2.5 text-sm text-gray-700 font-medium">Aktif (Tampilkan di Website)</span>
                </label>
            </div>
        </div>

        <!-- TOMBOL AKSI -->
        <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.team.index') }}" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary flex items-center gap-2">
                <iconify-icon icon="solar:diskette-bold" class="text-lg"></iconify-icon>
                Simpan Profil
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function addListField(containerId, fieldName, placeholderText) {
        const container = document.getElementById(containerId);
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="${fieldName}" placeholder="${placeholderText}" class="form-input">
            <button type="button" onclick="this.parentElement.remove()" class="px-4 border border-red-200 text-red-500 rounded-xl hover:bg-red-50 text-sm font-medium transition-colors">
                Hapus
            </button>
        `;
        container.appendChild(div);
    }
</script>
@endsection
