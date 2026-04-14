@extends('admin.layout')

@section('title', 'Prestasi')
@section('header', 'Prestasi')
@section('subheader', 'Tambah / ubah / hapus daftar prestasi')

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Tambah Prestasi</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.achievements.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-6 gap-4 items-end">
            @csrf

            <div class="md:col-span-3">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
                <input name="title" type="text" value="{{ old('title') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
            </div>

            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Juara</label>
                <input name="icon" type="text" maxlength="10" value="{{ old('icon') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Juara">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Foto</label>
                <input name="image" type="file" accept=".jpg,.jpeg,image/jpeg" class="w-full rounded-xl border border-gray-300 px-4 py-2 bg-white">
            </div>

            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Urutan</label>
                <input name="sort_order" type="number" min="0" value="{{ old('sort_order', 0) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>

            <div class="md:col-span-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Keterangan</label>
                <input name="subtitle" type="text" value="{{ old('subtitle') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Tingkat Kecamatan 2024">
            </div>

            <div class="flex items-center gap-2 md:col-span-6">
                <input id="is_active" name="is_active" type="checkbox" value="1" @checked(old('is_active', '1')) class="rounded border-gray-300">
                <label for="is_active" class="text-sm font-semibold text-gray-700">Aktif</label>
            </div>

            <div class="md:col-span-6">
                <button class="rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Simpan</button>
            </div>
        </form>

        <p class="mt-4 text-xs text-gray-500">Catatan: jika foto tidak muncul di website, pastikan sudah menjalankan <code class="font-mono">php artisan storage:link</code>.</p>
    </section>

    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">Daftar Prestasi ({{ $achievements->count() }})</h2>
        </div>

        @if ($achievements->isEmpty())
            <p class="text-gray-600">Belum ada prestasi.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-600">
                            <th class="py-2 pr-4">Foto</th>
                            <th class="py-2 pr-4">Juara</th>
                            <th class="py-2 pr-4">Judul</th>
                            <th class="py-2 pr-4">Urutan</th>
                            <th class="py-2 pr-4">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($achievements as $achievement)
                            <tr>
                                <td class="py-3 pr-4">
                                    @if ($achievement->image_path)
                                        <img src="{{ asset('storage/' . $achievement->image_path) }}" alt="{{ $achievement->title }}" class="w-16 h-12 object-cover rounded-xl border border-gray-200">
                                    @else
                                        <span class="text-gray-400">—</span>
                                    @endif
                                </td>
                                <td class="py-3 pr-4 text-lg">{{ $achievement->icon ?: 'Juara' }}</td>
                                <td class="py-3 pr-4">
                                    <div class="font-semibold text-gray-900">{{ $achievement->title }}</div>
                                    <div class="text-xs text-gray-500">{{ $achievement->subtitle ?? '-' }}</div>
                                </td>
                                <td class="py-3 pr-4 text-gray-700">{{ $achievement->sort_order }}</td>
                                <td class="py-3 pr-4">
                                    @if ($achievement->is_active)
                                        <span class="inline-flex rounded-full bg-green-100 text-green-800 text-xs font-semibold px-3 py-1">Aktif</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.achievements.edit', $achievement) }}" class="rounded-xl border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50">Edit</a>
                                        <form method="POST" action="{{ route('admin.achievements.destroy', $achievement) }}" onsubmit="return confirm('Hapus prestasi ini?')">
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
    </section>
@endsection
