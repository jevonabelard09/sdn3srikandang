@extends('admin.layout')

@section('title', 'Data Guru')
@section('header', 'Data Guru')
@section('subheader', 'Tambah / ubah / hapus data guru')

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
@endphp
@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <h2 class="text-lg font-bold text-gray-900">Form Tambah Guru</h2>
            <p class="text-sm text-gray-500">Isi data guru, lalu klik Simpan.</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Foto Profil</label>
                <input name="photo" type="file" accept="image/jpeg,image/png,image/webp,image/gif,image/*" class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white">
                <p class="text-xs text-gray-500 mt-1">Maks 5MB, JPG/PNG/WebP/GIF.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input name="name" type="text" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Nama lengkap" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">NIP</label>
                <input name="nip" type="text" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="NIP (jika ada)">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Jabatan</label>
                <select name="role" class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white">
                    <option value="">Pilih jabatan</option>
                    @foreach ($roleOptions as $opt)
                        <option value="{{ $opt }}">{{ $opt }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <span class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin</span>
                <div class="flex items-center gap-4 rounded-xl border border-gray-300 px-4 py-3">
                    <label class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <input type="radio" name="gender" value="L" class="rounded-full border-gray-300" checked>
                        Laki-laki
                    </label>
                    <label class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <input type="radio" name="gender" value="P" class="rounded-full border-gray-300">
                        Perempuan
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Urutan</label>
                <input name="sort_order" type="number" min="0" value="0" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>

            <div class="flex items-center gap-2">
                <input id="is_active" name="is_active" type="checkbox" value="1" checked class="rounded border-gray-300">
                <label for="is_active" class="text-sm font-semibold text-gray-700">Aktif</label>
            </div>

            <div class="md:col-span-2">
                <button class="w-full sm:w-auto rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Simpan</button>
            </div>
        </form>
    </section>

    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">Daftar Guru ({{ $teachers->count() }})</h2>
        </div>

        @if ($teachers->isEmpty())
            <p class="text-gray-600">Belum ada data guru.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-600">
                            <th class="py-2 pr-4">Foto</th>
                            <th class="py-2 pr-4">Nama</th>
                            <th class="py-2 pr-4">Jabatan</th>
                            <th class="py-2 pr-4">Jenis Kelamin</th>
                            <th class="py-2 pr-4">NIP</th>
                            <th class="py-2 pr-4">Urutan</th>
                            <th class="py-2 pr-4">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td class="py-3 pr-4">
                                    <div class="w-12 h-12 rounded-xl bg-gray-100 overflow-hidden border border-gray-200">
                                        @if ($teacher->photo_path)
                                            <img src="{{ asset('storage/' . $teacher->photo_path) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                </td>
                                <td class="py-3 pr-4 font-semibold text-gray-900">{{ $teacher->name }}</td>
                                <td class="py-3 pr-4 text-gray-700">{{ $teacher->role ?? '-' }}</td>
                                <td class="py-3 pr-4 text-gray-700">{{ $teacher->gender ? ($genderLabel[$teacher->gender] ?? $teacher->gender) : '-' }}</td>
                                <td class="py-3 pr-4 text-gray-700">{{ $teacher->nip ?? '-' }}</td>
                                <td class="py-3 pr-4 text-gray-700">{{ $teacher->sort_order }}</td>
                                <td class="py-3 pr-4">
                                    @if ($teacher->is_active)
                                        <span class="inline-flex rounded-full bg-green-100 text-green-800 text-xs font-semibold px-3 py-1">Aktif</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.teachers.edit', $teacher) }}" class="rounded-xl border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50">Edit</a>
                                        <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" onsubmit="return confirm('Hapus data guru ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="rounded-xl border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-100">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6 text-xs text-gray-500">
            <p>Catatan: Jalankan <code class="font-mono">php artisan storage:link</code> agar foto bisa tampil.</p>
        </div>
    </section>
@endsection