@extends('admin.layout')

@section('title', 'Akun')
@section('header', 'Akun Admin')
@section('subheader', 'Ubah nama, email, dan password admin')

@section('content')
    <section class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Pengaturan Akun</h2>

        @if ($errors->any())
            <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.account.update') }}" class="space-y-4 max-w-xl">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                <input name="name" type="text" value="{{ old('name', $adminUser->name) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input name="email" type="email" value="{{ old('email', $adminUser->email) }}" class="w-full rounded-xl border border-gray-300 px-4 py-3" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru (opsional)</label>
                <input name="password" type="password" class="w-full rounded-xl border border-gray-300 px-4 py-3" autocomplete="new-password">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password Baru</label>
                <input name="password_confirmation" type="password" class="w-full rounded-xl border border-gray-300 px-4 py-3" autocomplete="new-password">
            </div>

            <div class="pt-2">
                <button class="rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-6 py-3 transition">Simpan</button>
            </div>
        </form>
    </section>
@endsection
