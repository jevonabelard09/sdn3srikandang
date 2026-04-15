@extends('admin.layout')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('subheader', 'Ringkasan data website')

@section('content')
    <section class="grid sm:grid-cols-2 xl:grid-cols-5 gap-4">
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

        <a href="{{ route('admin.contact-messages.index') }}" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-gray-600">Pesan Kontak</div>
                    <div class="text-3xl font-extrabold text-gray-900 mt-2">{{ $stats['contact_messages'] ?? 0 }}</div>
                    <div class="mt-2 text-xs font-semibold text-amber-700">
                        {{ $stats['unread_contact_messages'] ?? 0 }} belum dibaca
                    </div>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center">
                    <x-admin.icon name="contact" class="w-6 h-6" />
                </div>
            </div>
        </a>
    </section>

    <section class="mt-6 grid gap-6 lg:grid-cols-[minmax(0,1.2fr)_minmax(280px,0.8fr)]">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between gap-4 mb-4">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Pesan Kontak Terbaru</h2>
                    <p class="text-sm text-gray-600">Pantau pesan yang baru masuk dari halaman kontak website.</p>
                </div>
                <a href="{{ route('admin.contact-messages.index') }}" class="text-sm font-semibold text-amber-700 hover:underline">Buka semua</a>
            </div>

            @if (($latestContactMessages ?? collect())->isEmpty())
                <p class="text-gray-600">Belum ada pesan kontak.</p>
            @else
                <div class="space-y-3">
                    @foreach ($latestContactMessages as $message)
                        <a href="{{ route('admin.contact-messages.show', $message) }}"
                           class="block rounded-2xl border px-4 py-4 transition hover:border-yellow-300 hover:bg-yellow-50/50 {{ $message->read_at ? 'border-gray-200 bg-white' : 'border-amber-200 bg-amber-50/70' }}">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <div class="truncate font-bold text-gray-900">{{ $message->subject }}</div>
                                        @if (! $message->read_at)
                                            <span class="inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-[11px] font-semibold text-amber-800">Baru</span>
                                        @endif
                                    </div>
                                    <div class="mt-1 text-sm text-gray-600">{{ $message->name }} • {{ $message->email }}</div>
                                    <div class="mt-2 text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($message->message, 110) }}</div>
                                </div>
                                <div class="shrink-0 text-xs text-gray-500">{{ $message->created_at?->translatedFormat('d M Y') }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-2">Akun</h2>
            <p class="text-gray-600 mb-4">Kelola akun admin dan pengaturan dasar.</p>
            <a href="{{ route('admin.account.edit') }}" class="inline-flex items-center gap-2 rounded-xl bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold px-5 py-3 transition">
                <x-admin.icon name="account" class="w-5 h-5" />
                Kelola Akun
            </a>
        </div>
    </section>
@endsection
