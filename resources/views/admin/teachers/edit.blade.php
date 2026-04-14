@extends('admin.layout')

@section('title', 'Edit Data Guru')
@section('header', 'Edit Data Guru')
@section('subheader', 'Perbarui data guru')

@php
    $roleOptions = [
        'Kepala Sekolah',
        'Guru Kelas I',
        'Guru Kelas II',
        'Guru Kelas III',
        'Guru Kelas IV',
        'Guru Kelas V',
        'Guru Kelas VI',
        'Guru PAI',
        'Penjaga Sekolah',
    ];

    $genderLabel = [
        'L' => 'Laki-laki',
        'P' => 'Perempuan',
    ];

    $selectedGender = old('gender', $teacher->gender);
    $selectedRole = old('role', $teacher->role);
@endphp
@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">{{ $teacher->name }}</h2>
                <p class="text-sm text-gray-500">{{ $teacher->role ?? '—' }}{{ $teacher->gender ? ' • ' . ($genderLabel[$teacher->gender] ?? $teacher->gender) : '' }}</p>
            </div>
            <a href="{{ route('admin.teachers.index') }}" class="text-sm font-semibold text-gray-700 hover:underline">Kembali</a>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.teachers.update', $teacher) }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            @method('PUT')

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Profil (opsional)</label>
                <input name="photo" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/*" class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white">

                @if ($teacher->photo_path)
                    <div class="mt-3 flex flex-col sm:flex-row sm:items-center gap-3">
                        <img src="{{ asset('storage/' . $teacher->photo_path) }}" alt="{{ $teacher->name }}" class="w-20 h-20 rounded-2xl object-cover border border-gray-200">
                        <label class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700">
                            <input name="remove_photo" type="checkbox" value="1" class="rounded border-gray-300">
                            Hapus foto
                        </label>
                    </div>
                @endif
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input name="name" type="text" value="{{ old('name', $teacher->name) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">NIP</label>
                <input name="nip" type="text" value="{{ old('nip', $teacher->nip) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Jabatan</label>
                <select name="role" class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white">
                    <option value="">Pilih jabatan</option>
                    @foreach ($roleOptions as $opt)
                        <option value="{{ $opt }}" {{ $selectedRole === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                    @if ($selectedRole && ! in_array($selectedRole, $roleOptions, true))
                        <option value="{{ $selectedRole }}" selected>{{ $selectedRole }}</option>
                    @endif
                </select>
                <p class="text-xs text-gray-500 mt-1">Jika jabatan sebelumnya tidak ada di daftar, akan tetap dipilih.</p>
            </div>

            <div>
                <span class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin</span>
                <div class="flex items-center gap-4 rounded-xl border border-gray-300 px-4 py-3">
                    <label class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <input type="radio" name="gender" value="L" class="rounded-full border-gray-300" {{ ($selectedGender === 'L' || $selectedGender === null) ? 'checked' : '' }}>
                        Laki-laki
                    </label>
                    <label class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <input type="radio" name="gender" value="P" class="rounded-full border-gray-300" {{ $selectedGender === 'P' ? 'checked' : '' }}>
                        Perempuan
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Urutan</label>
                <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $teacher->sort_order) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>

            <div class="flex items-center gap-2">
                <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $teacher->is_active) ? 'checked' : '' }} class="rounded border-gray-300">
                <label for="is_active" class="text-sm font-semibold text-gray-700">Aktif</label>
            </div>

            <div class="md:col-span-2">
                <button class="w-full sm:w-auto rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Simpan Perubahan</button>
            </div>
        </form>
    </section>
@endsection