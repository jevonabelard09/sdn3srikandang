@extends('admin.layout')

@section('title', 'Migrasi')
@section('header', 'Database Belum Siap')
@section('subheader', 'Tabel belum ada di database')

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Panel {{ $title ?? 'Admin' }} belum bisa dibuka</h2>
        <p class="text-gray-700 mb-4">
            Tabel <code class="font-mono bg-gray-100 px-2 py-1 rounded">{{ $table }}</code> belum ada di database.
        </p>

        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4 text-sm text-gray-800">
            <div class="font-semibold mb-2">Jalankan perintah ini di folder project:</div>
            <pre class="font-mono text-xs whitespace-pre-wrap">php artisan migrate</pre>
        </div>

        <div class="mt-4 text-sm text-gray-600">
            <p>Jika masih error, coba: <code class="font-mono">php artisan optimize:clear</code></p>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Kembali ke Dashboard</a>
        </div>
    </section>
@endsection