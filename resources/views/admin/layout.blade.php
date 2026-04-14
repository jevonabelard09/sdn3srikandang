<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - SD N 3 Srikandang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-950 m-0 p-0 md:overflow-hidden">
    @php
        $adminSections = [
            [
                'label' => 'Umum',
                'items' => [
                    [
                        'route' => 'admin.dashboard',
                        'active' => 'admin.dashboard',
                        'icon' => 'dashboard',
                        'label' => 'Dashboard',
                    ],
                ],
            ],
            [
                'label' => 'Konten',
                'items' => [
                    [
                        'route' => 'admin.gallery.index',
                        'active' => 'admin.gallery.*',
                        'icon' => 'gallery',
                        'label' => 'Galeri',
                    ],
                    [
                        'route' => 'admin.achievements.index',
                        'active' => 'admin.achievements.*',
                        'icon' => 'trophy',
                        'label' => 'Prestasi',
                    ],
                    [
                        'route' => 'admin.programs.index',
                        'active' => 'admin.programs.*',
                        'icon' => 'program',
                        'label' => 'Program',
                    ],
                    [
                        'route' => 'admin.teachers.index',
                        'active' => 'admin.teachers.*',
                        'icon' => 'teachers',
                        'label' => 'Data Guru',
                    ],
                ],
            ],
            [
                'label' => 'Pengaturan',
                'items' => [
                    [
                        'route' => 'admin.account.edit',
                        'active' => 'admin.account.*',
                        'icon' => 'account',
                        'label' => 'Akun',
                    ],
                ],
            ],
            [
                'label' => 'Lainnya',
                'items' => [
                    [
                        'route' => 'galeri',
                        'active' => null,
                        'icon' => 'external',
                        'label' => 'Lihat Website',
                    ],
                ],
            ],
        ];
    @endphp

    <div class="flex min-h-screen md:h-screen bg-gray-950">
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
                    @foreach ($adminSections as $section)
                        <div>
                            <div class="px-3 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">{{ $section['label'] }}</div>
                            <div class="mt-1 space-y-1">
                                @foreach ($section['items'] as $item)
                                    @php
                                        $isActive = $item['active'] ? request()->routeIs($item['active']) : false;
                                        $href = filter_var($item['route'], FILTER_VALIDATE_URL) ? $item['route'] : route($item['route']);
                                    @endphp
                                    <a href="{{ $href }}" class="group flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold {{ $isActive ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}" @if ($isActive) aria-current="page" @endif>
                                        <x-admin.icon name="{{ $item['icon'] }}" class="w-5 h-5 {{ $isActive ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                        <span>{{ $item['label'] }}</span>
                                        @if ($isActive)
                                            <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
            <div id="mobile-menu" class="fixed inset-0 z-40 hidden md:hidden" aria-hidden="true">
                <button type="button" data-mobile-close class="absolute inset-0 bg-gray-950/70 backdrop-blur-sm" aria-label="Tutup menu"></button>

                <aside class="relative flex h-full w-[min(20rem,88vw)] max-w-sm flex-col bg-gray-950 text-white shadow-2xl">
                    <div class="flex items-center justify-between border-b border-gray-800 px-5 py-4">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center overflow-hidden border border-white/10">
                                <img src="{{ asset('assets/img/logo-sdn3srikandang.png') }}" alt="Logo SD N 3 Srikandang" class="w-full h-full object-contain p-1" onerror="this.remove(); this.parentElement.className='w-10 h-10 rounded-xl bg-gray-900 border border-gray-800 flex items-center justify-center text-gray-200 text-xs font-bold'; this.parentElement.textContent='SD';">
                            </div>
                            <div class="min-w-0">
                                <div class="truncate text-sm font-extrabold text-gray-100 tracking-wide">SD N 3 Srikandang</div>
                                <div class="text-sm text-gray-300">Admin Panel</div>
                            </div>
                        </div>

                        <button type="button" data-mobile-close class="rounded-xl border border-gray-700 p-2 text-gray-100 hover:bg-gray-900" aria-label="Tutup menu">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <nav class="flex-1 overflow-y-auto px-4 py-4">
                        <div class="space-y-3">
                            @foreach ($adminSections as $section)
                                <div>
                                    <div class="px-3 text-[11px] font-semibold tracking-wider text-gray-400 uppercase">{{ $section['label'] }}</div>
                                    <div class="mt-1 space-y-1">
                                        @foreach ($section['items'] as $item)
                                            @php
                                                $isActive = $item['active'] ? request()->routeIs($item['active']) : false;
                                                $href = filter_var($item['route'], FILTER_VALIDATE_URL) ? $item['route'] : route($item['route']);
                                            @endphp
                                            <a href="{{ $href }}" class="group flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold {{ $isActive ? 'bg-yellow-400 text-gray-900' : 'text-gray-200 hover:bg-gray-900' }}">
                                                <x-admin.icon name="{{ $item['icon'] }}" class="w-5 h-5 {{ $isActive ? 'text-gray-900' : 'text-gray-300 group-hover:text-gray-100' }}" />
                                                <span>{{ $item['label'] }}</span>
                                                @if ($isActive)
                                                    <span class="ml-auto h-2.5 w-2.5 rounded-full bg-gray-900"></span>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </nav>

                    <div class="border-t border-gray-800 p-4">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="flex w-full items-center justify-center gap-2 rounded-xl border border-gray-700 px-4 py-3 text-sm font-semibold text-gray-200 hover:bg-gray-900">
                                <x-admin.icon name="logout" class="w-4 h-4 text-gray-200" />
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </aside>
            </div>

            <header class="bg-white border-b border-gray-200 sticky top-0 z-20">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between gap-4">
                    <div class="flex items-start gap-3 min-w-0">
                        <button type="button" id="mobile-menu-button" class="inline-flex md:hidden items-center justify-center rounded-xl border border-gray-200 p-2 text-gray-700 hover:bg-gray-100" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu admin">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <div class="min-w-0">
                            <h1 class="text-lg sm:text-xl font-bold text-gray-900">@yield('header', 'Admin')</h1>
                            @hasSection('subheader')
                                <p class="text-sm text-gray-600">@yield('subheader')</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                        <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-700 hover:underline">Beranda</a>
                        <form method="POST" action="{{ route('admin.logout') }}" class="md:hidden">
                            @csrf
                            <button class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-3 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                                <x-admin.icon name="logout" class="w-4 h-4" />
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-4 md:pt-0 pb-8">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileCloseButtons = document.querySelectorAll('[data-mobile-close]');

        if (mobileMenu && mobileMenuButton) {
            const setMobileMenuState = (isOpen) => {
                mobileMenu.classList.toggle('hidden', !isOpen);
                mobileMenuButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                document.body.classList.toggle('overflow-hidden', isOpen);
            };

            mobileMenuButton.addEventListener('click', () => setMobileMenuState(true));
            mobileCloseButtons.forEach((button) => button.addEventListener('click', () => setMobileMenuState(false)));

            window.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setMobileMenuState(false);
                }
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    setMobileMenuState(false);
                }
            });
        }
    </script>
</body>
</html>
