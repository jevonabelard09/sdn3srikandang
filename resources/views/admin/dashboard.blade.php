@extends('admin.layout')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('subheader', 'Ringkasan data website')

@section('content')
    <section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.gallery.index') }}" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-gray-600">Galeri</div>
                    <div class="text-3xl font-extrabold text-gray-900 mt-2">{{ $stats['gallery'] ?? 0 }}</div>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-700 flex items-center justify-center">
                    <x-admin.icon name="gallery" class="w-6 h-6" />
                </div>
            </div>
        </a>

        <a href="{{ route('admin.teachers.index') }}" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-gray-600">Guru</div>
                    <div class="text-3xl font-extrabold text-gray-900 mt-2">{{ $stats['teachers'] ?? 0 }}</div>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center">
                    <x-admin.icon name="teachers" class="w-6 h-6" />
                </div>
            </div>
        </a>

        <a href="{{ route('admin.programs.index') }}" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-gray-600">Program</div>
                    <div class="text-3xl font-extrabold text-gray-900 mt-2">{{ $stats['programs'] ?? 0 }}</div>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                    <x-admin.icon name="program" class="w-6 h-6" />
                </div>
            </div>
        </a>

        <a href="{{ route('admin.achievements.index') }}" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-gray-600">Prestasi</div>
                    <div class="text-3xl font-extrabold text-gray-900 mt-2">{{ $stats['achievements'] ?? 0 }}</div>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-700 flex items-center justify-center">
                    <x-admin.icon name="trophy" class="w-6 h-6" />
                </div>
            </div>
        </a>
    </section>

    <section class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Akun</h2>
        <p class="text-gray-600 mb-4">Kelola akun admin dan pengaturan dasar.</p>
        <a href="{{ route('admin.account.edit') }}" class="inline-flex items-center gap-2 rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-5 py-3 transition">
            <x-admin.icon name="account" class="w-5 h-5" />
            Kelola Akun
        </a>
    </section>
@endsection