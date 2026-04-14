<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - SD N 3 Srikandang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-950 m-0 p-0 overflow-hidden">
    <div class="flex h-screen bg-gray-950">
        <aside class="hidden md:flex w-64 shrink-0 flex-col bg-gray-950 text-white border-r border-gray-800">
            <div class="px-6 py-3 border-b border-gray-800 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center overflow-hidden border border-white/10">
                        <img src="{{ asset('assets/img/logo-sdn3srikandang.png') }}" alt="Logo SD N 3 Srikandang" class="w-full h-full object-contain p-1" onerror="this.remove(); this.parentElement.className='w-10 h-10 rounded-xl bg-gray-900 border border-gray-800 flex items-center justify-center text-gray-200 text-xs font-bold'; this.parentElement.textContent='SD';">
                    </div>
                    <div>
                        <div class="text-base font-extrabold text-gray-100 tracking-wide">SD N 3 Srikandang</div>
                        <div class="text-base font-normal text-gray-200 mt-0.5">Admin Panel</div>
                    </div>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto px-4 pb-4">
                <div class="space-y-3">
                    <div>
                        <div class="px-3 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">Umum</div>
                        <div class="mt-1 space-y-1">
                            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                                <x-admin.icon name="dashboard" class="w-5 h-5 -translate-y-0.5 {{ request()->routeIs('admin.dashboard') ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                <span>Dashboard</span>
                                @if (request()->routeIs('admin.dashboard'))
                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                @endif
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="px-3 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">Konten</div>
                        <div class="mt-1 space-y-1">
                            <a href="{{ route('admin.gallery.index') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ request()->routeIs('admin.gallery.*') ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if (request()->routeIs('admin.gallery.*')) aria-current="page" @endif>
                                <x-admin.icon name="gallery" class="w-5 h-5 {{ request()->routeIs('admin.gallery.*') ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                <span>Galeri</span>
                                @if (request()->routeIs('admin.gallery.*'))
                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                @endif
                            </a>

                            <a href="{{ route('admin.achievements.index') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ request()->routeIs('admin.achievements.*') ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if (request()->routeIs('admin.achievements.*')) aria-current="page" @endif>
                                <x-admin.icon name="trophy" class="w-5 h-5 -translate-y-0.5 {{ request()->routeIs('admin.achievements.*') ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                <span>Prestasi</span>
                                @if (request()->routeIs('admin.achievements.*'))
                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                @endif
                            </a>

                            <a href="{{ route('admin.programs.index') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ request()->routeIs('admin.programs.*') ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if (request()->routeIs('admin.programs.*')) aria-current="page" @endif>
                                <x-admin.icon name="program" class="w-5 h-5 {{ request()->routeIs('admin.programs.*') ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                <span>Program</span>
                                @if (request()->routeIs('admin.programs.*'))
                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                @endif
                            </a>

                            <a href="{{ route('admin.teachers.index') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ request()->routeIs('admin.teachers.*') ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if (request()->routeIs('admin.teachers.*')) aria-current="page" @endif>
                                <x-admin.icon name="teachers" class="w-5 h-5 {{ request()->routeIs('admin.teachers.*') ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                <span>Data Guru</span>
                                @if (request()->routeIs('admin.teachers.*'))
                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                @endif
                            </a>
                        </div>
                    </div>

                    <div>
                        <div class="px-3 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">Pengaturan</div>
                        <div class="mt-1 space-y-1">
                            <a href="{{ route('admin.account.edit') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ request()->routeIs('admin.account.*') ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if (request()->routeIs('admin.account.*')) aria-current="page" @endif>
                                <x-admin.icon name="account" class="w-5 h-5 {{ request()->routeIs('admin.account.*') ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                <span>Akun</span>
                                @if (request()->routeIs('admin.account.*'))
                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                @endif
                            </a>

                        </div>
                    </div>

                    <div>
                        <div class="px-3 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">Lainnya</div>
                        <div class="mt-1 space-y-1">
                            <a href="{{ route('galeri') }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold text-gray-200 hover:bg-gray-900">
                                <x-admin.icon name="external" class="w-5 h-5 text-gray-300 group-hover:text-gray-100" />
                                <span>Lihat Website</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="p-4 border-t border-gray-800 shrink-0">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="w-full flex items-center justify-center gap-2 rounded-xl border border-gray-700 px-4 py-2 text-sm font-semibold text-gray-200 hover:bg-gray-900">
                        <x-admin.icon name="logout" class="w-4 h-4 text-gray-200" />
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 min-w-0 overflow-y-auto bg-gray-50">
            <header class="bg-white border-b border-gray-200 sticky top-0 z-20">
                <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">@yield('header', 'Admin')</h1>
                        @hasSection('subheader')
                            <p class="text-sm text-gray-600">@yield('subheader')</p>
                        @endif
                    </div>
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-700 hover:underline">Beranda</a>
                </div>
            </header>

            <main class="max-w-6xl mx-auto px-6 pt-0 pb-8">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

