@extends('admin.layout')

@section('title', 'Galeri')
@section('header', 'Galeri')
@section('subheader', 'Tambah / hapus foto galeri')

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Tambah Foto</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-4 gap-4 items-end">
            @csrf
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar</label>
                <input name="image" type="file" accept="image/jpeg,image/png,image/webp,image/gif" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
                <p class="text-xs text-gray-500 mt-1">Maks 5MB, format JPG/PNG/WebP/GIF.</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul (opsional)</label>
                <input name="title" type="text" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Contoh: Upacara bendera">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori (opsional)</label>
                <input name="category" type="text" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="kegiatan / sekolah">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Urutan</label>
                <input name="sort_order" type="number" min="0" value="0" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>
            <div class="md:col-span-4">
                <button class="rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Upload</button>
            </div>
        </form>
    </section>

    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">Daftar Foto ({{ $images->count() }})</h2>
            <a href="{{ route('galeri') }}" class="text-sm font-semibold text-gray-700 hover:underline">Lihat halaman galeri</a>
        </div>

        @if ($images->isEmpty())
            <p class="text-gray-600">Belum ada foto. Upload foto pertama di atas.</p>
        @else
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($images as $img)
                    <div class="rounded-2xl overflow-hidden border border-gray-200">
                        <div class="aspect-[4/3] bg-gray-100">
                            <img src="{{ asset('storage/' . $img->path) }}" alt="{{ $img->title ?? 'Galeri' }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-3 space-y-2">
                            <div>
                                <div class="font-semibold text-gray-900 text-sm">{{ $img->title ?? 'Tanpa judul' }}</div>
                                <div class="text-xs text-gray-500">{{ $img->category ?? 'Tanpa kategori' }} • order {{ $img->sort_order }}</div>
                            </div>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $img) }}" onsubmit="return confirm('Hapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="w-full rounded-xl border border-red-200 bg-red-50 text-red-700 text-sm font-semibold py-2 hover:bg-red-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-6 text-xs text-gray-500">
            <p>Catatan: Jalankan <code class="font-mono">php artisan storage:link</code> agar foto bisa tampil.</p>
        </div>
    </section>
@endsection