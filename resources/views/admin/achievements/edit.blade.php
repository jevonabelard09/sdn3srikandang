@extends('admin.layout')

@section('title', 'Edit Prestasi')
@section('header', 'Edit Prestasi')
@section('subheader', 'Perbarui prestasi')

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">{{ $achievement->title }}</h2>
            <a href="{{ route('admin.achievements.index') }}" class="text-sm font-semibold text-gray-700 hover:underline">Kembali</a>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.achievements.update', $achievement) }}" enctype="multipart/form-data" class="grid md:grid-cols-6 gap-4 items-end">
            @csrf
            @method('PUT')

            <div class="md:col-span-3">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
                <input name="title" type="text" value="{{ old('title', $achievement->title) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
            </div>

            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Juara</label>
                <input name="icon" type="text" maxlength="10" value="{{ old('icon', $achievement->icon) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Juara">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Ganti Foto</label>
                <input name="image" type="file" accept=".jpg,.jpeg,image/jpeg" class="w-full rounded-xl border border-gray-300 px-4 py-2 bg-white">
            </div>

            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Urutan</label>
                <input name="sort_order" type="number" min="0" value="{{ old('sort_order', $achievement->sort_order) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>

            <div class="md:col-span-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Keterangan</label>
                <input name="subtitle" type="text" value="{{ old('subtitle', $achievement->subtitle) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Tingkat Kecamatan 2024">
            </div>

            @if ($achievement->image_path)
                <div class="md:col-span-6">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 rounded-2xl border border-gray-200 bg-gray-50 p-4">
                        <img src="{{ asset('storage/' . $achievement->image_path) }}" alt="{{ $achievement->title }}" class="w-40 h-28 object-cover rounded-2xl border border-gray-200">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-900">Foto saat ini</div>
                            <div class="mt-2 flex items-center gap-2">
                                <input id="remove_image" name="remove_image" type="checkbox" value="1" class="rounded border-gray-300">
                                <label for="remove_image" class="text-sm font-semibold text-gray-700">Hapus foto</label>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">Jika upload foto baru, foto lama otomatis diganti.</div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex items-center gap-2 md:col-span-6">
                <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $achievement->is_active) ? 'checked' : '' }} class="rounded border-gray-300">
                <label for="is_active" class="text-sm font-semibold text-gray-700">Aktif</label>
            </div>

            <div class="md:col-span-6">
                <button class="rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Simpan Perubahan</button>
            </div>
        </form>
    </section>
@endsection







