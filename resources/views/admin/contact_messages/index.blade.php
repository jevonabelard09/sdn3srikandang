@extends('admin.layout')

@section('title', 'Kontak Management')
@section('header', 'Kontak Management')
@section('subheader', 'Lihat, baca, dan hapus pesan dari formulir kontak')

@section('content')
    @php
        $supportsReadStatus = $supportsReadStatus ?? ($adminHasContactMessageReadAtColumn ?? false);
        $unreadCount = $supportsReadStatus ? ($adminUnreadContactMessages ?? 0) : 0;
    @endphp

    <section class="grid gap-6 xl:grid-cols-[minmax(0,1.2fr)_minmax(320px,0.8fr)]">
        <div class="space-y-6">
            @unless ($supportsReadStatus)
                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-4 text-sm text-amber-800">
                    Kolom status baca belum tersedia di database. Jalankan <code class="font-mono">php artisan migrate</code> untuk mengaktifkan fitur pesan dibaca dan belum dibaca.
                </div>
            @endunless

            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                    <div class="text-sm font-semibold text-gray-500">Total Pesan</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900">{{ $messages->total() }}</div>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-5 shadow-sm">
                    <div class="text-sm font-semibold text-amber-700">Belum Dibaca</div>
                    <div class="mt-2 text-3xl font-extrabold text-amber-900">{{ $unreadCount }}</div>
                </div>

                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-5 shadow-sm">
                    <div class="text-sm font-semibold text-emerald-700">Sudah Dibaca</div>
                    <div class="mt-2 text-3xl font-extrabold text-emerald-900">{{ $supportsReadStatus ? max($messages->total() - $unreadCount, 0) : 0 }}</div>
                </div>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="mb-4 flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Daftar Pesan</h2>
                        <p class="text-sm text-gray-500">Klik salah satu pesan untuk melihat detail lengkap.</p>
                    </div>
                    <div class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                        {{ $messages->total() }} pesan
                    </div>
                </div>

                @if ($messages->isEmpty())
                    <div class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center text-gray-500">
                        Belum ada pesan masuk dari formulir kontak.
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach ($messages as $message)
                            @php
                                $isRead = $supportsReadStatus && ! is_null($message->read_at);
                            @endphp

                            <a href="{{ route('admin.contact-messages.show', $message) }}"
                               class="block rounded-2xl border px-4 py-4 transition hover:border-yellow-300 hover:bg-yellow-50/50 {{ $selectedMessage?->is($message) ? 'border-yellow-300 bg-yellow-50' : ($isRead ? 'border-gray-200 bg-white' : 'border-amber-200 bg-amber-50/70') }}">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="min-w-0">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <h3 class="truncate text-base font-bold text-gray-900">{{ $message->subject }}</h3>
                                            @if ($supportsReadStatus && ! $isRead)
                                                <span class="inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-[11px] font-semibold text-amber-800">Baru</span>
                                            @endif
                                        </div>
                                        <div class="mt-1 text-sm text-gray-600">
                                            {{ $message->name }} - {{ $message->email }}
                                        </div>
                                        <p class="mt-3 text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($message->message, 140) }}</p>
                                    </div>

                                    <div class="shrink-0 text-xs font-medium text-gray-500">
                                        {{ $message->created_at?->translatedFormat('d M Y, H:i') }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $messages->links() }}
                    </div>
                @endif
            </div>
        </div>

        <aside class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-lg font-bold text-gray-900">Detail Pesan</h2>

            @if (! $selectedMessage)
                <div class="mt-4 rounded-2xl border border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center text-gray-500">
                    Pilih pesan pada daftar di sebelah kiri untuk melihat isi lengkapnya.
                </div>
            @else
                <div class="mt-5 space-y-5">
                    <div class="flex flex-wrap items-center gap-2">
                        @if ($supportsReadStatus && $selectedMessage->read_at)
                            <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">Sudah dibaca</span>
                        @elseif ($supportsReadStatus)
                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800">Belum dibaca</span>
                        @else
                            <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">Status baca belum aktif</span>
                        @endif

                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                            {{ $selectedMessage->created_at?->translatedFormat('d M Y, H:i') }}
                        </span>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <div class="text-xs font-semibold uppercase tracking-wide text-gray-400">Subjek</div>
                            <div class="mt-1 text-lg font-bold text-gray-900">{{ $selectedMessage->subject }}</div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <div class="text-xs font-semibold uppercase tracking-wide text-gray-400">Nama</div>
                                <div class="mt-1 text-sm font-semibold text-gray-900">{{ $selectedMessage->name }}</div>
                            </div>

                            <div>
                                <div class="text-xs font-semibold uppercase tracking-wide text-gray-400">Email</div>
                                <a href="mailto:{{ $selectedMessage->email }}" class="mt-1 block text-sm font-semibold text-blue-700 hover:underline">{{ $selectedMessage->email }}</a>
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-semibold uppercase tracking-wide text-gray-400">Pesan</div>
                            <div class="mt-1 rounded-2xl bg-gray-50 p-4 text-sm leading-7 text-gray-700 whitespace-pre-line">{{ $selectedMessage->message }}</div>
                        </div>

                    </div>

                    <div class="flex flex-wrap gap-3 border-t border-gray-100 pt-5">
                        @if ($supportsReadStatus)
                            <form method="POST" action="{{ route('admin.contact-messages.update', $selectedMessage) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="action" value="{{ $selectedMessage->read_at ? 'unread' : 'read' }}">
                                <button class="rounded-xl border border-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                                    {{ $selectedMessage->read_at ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}
                                </button>
                            </form>
                        @endif

                        <a href="mailto:{{ $selectedMessage->email }}?subject={{ rawurlencode('Re: ' . $selectedMessage->subject) }}"
                           class="rounded-xl bg-yellow-400 px-4 py-2.5 text-sm font-bold text-gray-900 transition hover:bg-yellow-300">
                            Balas via Email
                        </a>

                        <form method="POST" action="{{ route('admin.contact-messages.destroy', $selectedMessage) }}" onsubmit="return confirm('Hapus pesan kontak ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-700 hover:bg-red-100">
                                Hapus Pesan
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </aside>
    </section>
@endsection
