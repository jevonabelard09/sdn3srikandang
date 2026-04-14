@extends('admin.layout')

@section('title', 'Program')
@section('header', 'Program')
@section('subheader', 'Tambah / ubah / hapus program sekolah')

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Tambah Program</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.programs.store') }}" enctype="multipart/form-data" class="grid md:grid-cols-6 gap-4 items-end">
            @csrf

            <div class="md:col-span-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
                <input name="title" type="text" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar (opsional)</label>
                <input name="image" type="file" accept=".jpg,.jpeg,.png,.webp,image/*" class="w-full rounded-xl border border-gray-300 px-4 py-2 bg-white">
            </div>

            <div class="md:col-span-1">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Urutan</label>
                <input name="sort_order" type="number" min="0" value="0" class="w-full rounded-xl border border-gray-300 px-4 py-3">
            </div>

            <div class="md:col-span-5">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi (opsional)</label>
                <textarea name="description" rows="3" class="w-full rounded-xl border border-gray-300 px-4 py-3" placeholder="Deskripsi singkat program..."></textarea>
            </div>

            <div class="flex items-center gap-2 md:col-span-6">
                <input id="is_active" name="is_active" type="checkbox" value="1" checked class="rounded border-gray-300">
                <label for="is_active" class="text-sm font-semibold text-gray-700">Aktif</label>
            </div>

            <div class="md:col-span-6">
                <button class="rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Simpan</button>
            </div>
        </form>

        <p class="mt-4 text-xs text-gray-500">Catatan: jika gambar tidak muncul di website, pastikan sudah menjalankan <code class="font-mono">php artisan storage:link</code>.</p>
    </section>

    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900">Daftar Program ({{ $programs->count() }})</h2>
        </div>

        @if ($programs->isEmpty())
            <p class="text-gray-600">Belum ada program.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-600">
                            <th class="py-2 pr-4">Gambar</th>
                            <th class="py-2 pr-4">Judul</th>
                            <th class="py-2 pr-4">Urutan</th>
                            <th class="py-2 pr-4">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($programs as $program)
                            <tr>
                                <td class="py-3 pr-4">
                                    @if ($program->image_path)
                                        <img src="{{ asset('storage/' . str_replace('\\', '/', $program->image_path)) }}" alt="{{ $program->title }}" class="w-16 h-12 object-cover rounded-xl border border-gray-200">
                                    @else
                                        <span class="text-gray-400">ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Â</span>
                                    @endif
                                </td>
                                <td class="py-3 pr-4">
                                    <div class="font-semibold text-gray-900">{{ $program->title }}</div>
                                    @if ($program->description)
                                        <div class="text-xs text-gray-500">{{ \Illuminate\Support\Str::limit($program->description, 80) }}</div>
                                    @endif
                                </td>
                                <td class="py-3 pr-4 text-gray-700">{{ $program->sort_order }}</td>
                                <td class="py-3 pr-4">
                                    @if ($program->is_active)
                                        <span class="inline-flex rounded-full bg-green-100 text-green-800 text-xs font-semibold px-3 py-1">Aktif</span>
                                    @else
                                        <span class="inline-flex rounded-full bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.programs.edit', $program) }}" class="rounded-xl border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50">Edit</a>
                                        <form method="POST" action="{{ route('admin.programs.destroy', $program) }}" onsubmit="return confirm('Hapus program ini?')">
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