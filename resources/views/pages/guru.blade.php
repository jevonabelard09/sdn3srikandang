<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru - SD N 3 Srikandang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Quicksand', sans-serif; overflow-x: hidden; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
        html { scroll-behavior: smooth; }
        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.95) !important;
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        @media (max-width: 1023px) {
            #navbar { background-color: #fff !important; }
            .navbar-scrolled { background-color: #fff !important; }
        }
        .mobile-menu { 
            transform: translateX(100%); 
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .mobile-menu.active { transform: translateX(0); }
        
        /* Overlay Backdrop */
        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 40;
        }
        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        /* Hamburger Animation */
        .hamburger-btn { line-height: 0; }
        .hamburger-btn .line-1 { transition: transform 0.3s ease, opacity 0.3s ease; }
        .hamburger-btn .line-2 { transition: transform 0.3s ease, opacity 0.3s ease; }
        .hamburger-btn .line-3 { transition: transform 0.3s ease, opacity 0.3s ease; }
        .hamburger-btn.active .line-1 { transform: translateY(8px) rotate(45deg); }
        .hamburger-btn.active .line-2 { opacity: 0; }
        .hamburger-btn.active .line-3 { transform: translateY(-8px) rotate(-45deg); }
        
        /* Prevent body scroll */
        body.menu-open { overflow: hidden; }
        
        /* Mobile menu link hover effects */
        #mobile-menu .nav-link {
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        #mobile-menu .nav-link:hover {
            background-color: #f3f4f6;
        }
        #mobile-menu .nav-link.active {
            background-color: #16a34a;
            color: #fff !important;
        }
.teacher-card { transition: all 0.3s ease; }
        .teacher-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .avatar-1{background:#fff}
        .avatar-2{background:#fff}
        .avatar-3{background:#fff}
        .avatar-4{background:#fff}
        .avatar-5{background:#fff}
        .avatar-6{background:#fff}
        .avatar-7{background:#fff}
        .avatar-8{background:#fff}
        .avatar-9{background:#fff}
    </style>
    @include('partials.primary-color')
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300 bg-white">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center shadow-lg overflow-hidden border border-gray-200">
    <img src="{{ asset('assets/img/logo-sdn3srikandang.png') }}" alt="Logo SD N 3 Srikandang" class="w-full h-full object-contain p-1" onerror="this.remove(); this.parentElement.className='w-12 h-12 bg-gradient-to-br from-green-600 to-emerald-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg'; this.parentElement.textContent='SD';">
</div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">SD N 3 Srikandang</h1>
                        <p class="text-xs text-gray-600">Membangun Generasi Unggul</p>
                    </div>
                </a>
                <div class="hidden lg:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('home') ? 'active' : '' }}" @if (request()->routeIs('home')) aria-current="page" @endif>Beranda</a>
                    <a href="{{ route('tentang') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('tentang') ? 'active' : '' }}" @if (request()->routeIs('tentang')) aria-current="page" @endif>Tentang</a>
                    <a href="{{ route('guru') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('guru') ? 'active' : '' }}" @if (request()->routeIs('guru')) aria-current="page" @endif>Guru</a>
                    <a href="{{ route('program') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('program') ? 'active' : '' }}" @if (request()->routeIs('program')) aria-current="page" @endif>Ekstrakurikuler</a>
                    <a href="{{ route('prestasi') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('prestasi') ? 'active' : '' }}" @if (request()->routeIs('prestasi')) aria-current="page" @endif>Prestasi</a>
                    <a href="{{ route('galeri') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('galeri') ? 'active' : '' }}" @if (request()->routeIs('galeri')) aria-current="page" @endif>Galeri</a>
                    <a href="{{ route('kontak') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('kontak*') ? 'active' : '' }}" @if (request()->routeIs('kontak*')) aria-current="page" @endif>Kontak</a>
                </div>
                <button id="mobile-menu-btn" class="hamburger-btn lg:hidden relative w-8 h-8 flex items-center justify-center">
                    <svg class="w-6 h-6 absolute" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path class="line-1" stroke-linecap="round" stroke-width="2" d="M4 6h16"></path>
                        <path class="line-2" stroke-linecap="round" stroke-width="2" d="M4 12h16"></path>
                        <path class="line-3" stroke-linecap="round" stroke-width="2" d="M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay & Panel -->
    <div id="menu-overlay" class="menu-overlay lg:hidden"></div>
    <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-72 h-full bg-white shadow-2xl lg:hidden z-50">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800">Menu</h3>
                <button id="close-menu" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto p-6">
                <div class="space-y-2">
                    <a href="{{ route('home') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('home') ? 'active' : '' }}" @if (request()->routeIs('home')) aria-current="page" @endif>Beranda</a>
                    <a href="{{ route('tentang') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('tentang') ? 'active' : '' }}" @if (request()->routeIs('tentang')) aria-current="page" @endif>Tentang</a>
                    <a href="{{ route('guru') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('guru') ? 'active' : '' }}" @if (request()->routeIs('guru')) aria-current="page" @endif>Guru</a>
                    <a href="{{ route('program') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('program') ? 'active' : '' }}" @if (request()->routeIs('program')) aria-current="page" @endif>Ekstrakurikuler</a>
                    <a href="{{ route('prestasi') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('prestasi') ? 'active' : '' }}" @if (request()->routeIs('prestasi')) aria-current="page" @endif>Prestasi</a>
                    <a href="{{ route('galeri') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('galeri') ? 'active' : '' }}" @if (request()->routeIs('galeri')) aria-current="page" @endif>Galeri</a>
                    <a href="{{ route('kontak') }}" class="nav-link block text-gray-700 font-medium transition {{ request()->routeIs('kontak*') ? 'active' : '' }}" @if (request()->routeIs('kontak*')) aria-current="page" @endif>Kontak</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Header -->
    @php
    $heroImage = asset('assets/img/foto guru bersama.jpeg');
    $heroImagePosition = 'center 40%';
    $heroImageScale = 1.08;
@endphp
@include('partials.page-hero', [
    'title' => 'Tenaga Pendidikan',
    'subtitle' => 'Guru, penjaga, dan staf SD N 3 Srikandang',
    'image' => $heroImage,
    'imagePosition' => $heroImagePosition,
    'imageScale' => $heroImageScale,
])
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">

            @php
                $teachers = $teachers ?? collect();
                $teachersByRole = $teachers->groupBy('role');

                $headmaster = $teachersByRole->get('Kepala Sekolah', collect())->sortBy('sort_order')->first();
                $headmasterDisplay = [
                    'name' => $headmaster?->name ?? 'Ahmad Kusen, S.Pd.SD',
                    'nip' => $headmaster?->nip ?? '196804191992031010',
                    'photo' => ($headmaster && $headmaster->photo_path)
                        ? asset('storage/' . str_replace('\\', '/', $headmaster->photo_path))
                        : asset('assets/img/kepala_sekolah-removebg-preview.png'),
                ];

                $roleMeta = [
                    'Guru Kelas I' => [
                        'avatarClass' => 'avatar-2',
                        'badgeClass' => 'bg-emerald-100 text-emerald-700',
                        'fallback' => [
                            'name' => 'Widiana Fitri Ambarwati, S.Pd.',
                            'nip' => '199003312023212018',
                            'photo' => asset('assets/img/guru_kelas_1-removebg-preview.png'),
                        ],
                    ],
                    'Guru Kelas II' => [
                        'avatarClass' => 'avatar-3',
                        'badgeClass' => 'bg-blue-100 text-blue-700',
                        'fallback' => [
                            'name' => 'MASHUR, S.E',
                            'nip' => '198702022022211005',
                            'photo' => asset('assets/img/guru_kelas_2-removebg-preview.png'),
                        ],
                    ],
                    'Guru Kelas III' => [
                        'avatarClass' => 'avatar-4',
                        'badgeClass' => 'bg-green-100 text-green-700',
                        'fallback' => [
                            'name' => 'Dewi Rahayu, S.Pd.',
                            'nip' => '199001102014022001',
                            'photo' => asset('assets/img/guru_kelas_3-removebg-preview.png'),
                        ],
                    ],
                    'Guru Kelas IV' => [
                        'avatarClass' => 'avatar-5',
                        'badgeClass' => 'bg-yellow-100 text-yellow-700',
                        'fallback' => [
                            'name' => 'Budi Santoso, S.Pd.',
                            'nip' => '198801152012011003',
                            'photo' => asset('assets/img/guru_kelas_4-removebg-preview.png'),
                        ],
                    ],
                    'Guru Kelas V' => [
                        'avatarClass' => 'avatar-6',
                        'badgeClass' => 'bg-green-100 text-green-700',
                        'fallback' => [
                            'name' => 'Sri Wahyuni, S.Pd.',
                            'nip' => '199205282015022002',
                            'photo' => asset('assets/img/guru_kelas_5-removebg-preview.png'),
                        ],
                    ],
                    'Guru Kelas VI' => [
                        'avatarClass' => 'avatar-7',
                        'badgeClass' => 'bg-orange-100 text-orange-700',
                        'fallback' => [
                            'name' => 'Hendra Wijaya, S.Pd.',
                            'nip' => '198604102009031008',
                            'photo' => asset('assets/img/guru_kelas_6-removebg-preview.png'),
                        ],
                    ],
                    'Guru PAI' => [
                        'avatarClass' => 'avatar-8',
                        'badgeClass' => 'bg-teal-100 text-teal-700',
                        'fallback' => [
                            'name' => 'HENDI RAHARJO, S.Pd.I',
                            'nip' => '199210152023211009',
                            'photo' => asset('assets/img/guru_pai-removebg-preview.png'),
                        ],
                    ],
                    'Penjaga Sekolah' => [
                        'avatarClass' => 'avatar-1',
                        'badgeClass' => 'bg-indigo-100 text-indigo-700',
                        'fallback' => [
                            'name' => 'Didik Riyanto',
                            'nip' => '-',
                            'photo' => asset('assets/img/penjaga-removebg-preview.png'),
                        ],
                    ],
                ];

                $orderedGuruKelasRoles = [
                    'Guru Kelas I',
                    'Guru Kelas II',
                    'Guru Kelas III',
                    'Guru Kelas IV',
                    'Guru Kelas V',
                    'Guru Kelas VI',
                ];

                $guruKelasCards = [];
                foreach ($orderedGuruKelasRoles as $role) {
                    $meta = $roleMeta[$role];
                    $items = ($teachersByRole->get($role, collect()))->sortBy('sort_order');

                    if ($items->isEmpty()) {
                        $guruKelasCards[] = [
                            'role' => $role,
                            'avatarClass' => $meta['avatarClass'],
                            'badgeClass' => $meta['badgeClass'],
                            'name' => $meta['fallback']['name'],
                            'nip' => $meta['fallback']['nip'],
                            'photo' => $meta['fallback']['photo'],
                        ];
                        continue;
                    }

                    foreach ($items as $t) {
                        $guruKelasCards[] = [
                            'role' => $role,
                            'avatarClass' => $meta['avatarClass'],
                            'badgeClass' => $meta['badgeClass'],
                            'name' => $t->name,
                            'nip' => $t->nip ?: '-',
                            'photo' => $t->photo_path
                                ? asset('storage/' . str_replace('\\', '/', $t->photo_path))
                                : $meta['fallback']['photo'],
                        ];
                    }
                }

                $mapelRoles = ['Guru PAI', 'Penjaga Sekolah'];
                $mapelCards = [];
                foreach ($mapelRoles as $role) {
                    $meta = $roleMeta[$role];
                    $items = ($teachersByRole->get($role, collect()))->sortBy('sort_order');

                    if ($items->isEmpty()) {
                        $mapelCards[] = [
                            'role' => $role,
                            'avatarClass' => $meta['avatarClass'],
                            'badgeClass' => $meta['badgeClass'],
                            'name' => $meta['fallback']['name'],
                            'nip' => $meta['fallback']['nip'],
                            'photo' => $meta['fallback']['photo'],
                        ];
                        continue;
                    }

                    foreach ($items as $t) {
                        $mapelCards[] = [
                            'role' => $role,
                            'avatarClass' => $meta['avatarClass'],
                            'badgeClass' => $meta['badgeClass'],
                            'name' => $t->name,
                            'nip' => $t->nip ?: '-',
                            'photo' => $t->photo_path
                                ? asset('storage/' . str_replace('\\', '/', $t->photo_path))
                                : $meta['fallback']['photo'],
                        ];
                    }
                }
            @endphp

            <!-- Kepala Sekolah -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center flex items-center justify-center gap-3">
                    <span class="text-green-600" aria-hidden="true">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path d="M3 10 12 3l9 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.5 10.5V21h15V10.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 21v-6a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span> Kepala Sekolah
                </h3>
                <div class="max-w-md mx-auto">
                    <div class="teacher-card bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                        <div class="relative h-56 flex items-center justify-center">
                            <div class="absolute inset-0 bg-white"></div>

                            <div class="relative w-40 h-40 rounded-full bg-white/95 ring-4 ring-white/70 shadow-2xl overflow-hidden flex items-center justify-center">
                                <img src="{{ $headmasterDisplay['photo'] }}" alt="Foto Kepala Sekolah" class="w-full h-full object-cover" loading="lazy" onerror="this.remove();">
                            </div>
                        </div>
                        <div class="p-7 text-center">
                            <h4 class="text-2xl font-bold text-gray-900 mb-1">{{ $headmasterDisplay['name'] }}</h4>
                            <div class="flex items-center justify-center gap-2 mb-3">
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-sm font-semibold px-4 py-1 rounded-full">Kepala Sekolah</span>
                            </div>
                            <p class="text-gray-500 text-sm mb-5">NIP: {{ $headmasterDisplay['nip'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guru Kelas -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center flex items-center justify-center gap-3">
                    <span class="text-emerald-600" aria-hidden="true">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path d="M6 10.5 12 7l6 3.5-6 3.5-6-3.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M6 10.5V15l6 3.5 6-3.5v-4.5" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M4 9.5 12 5l8 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 10.5v5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span> Guru Kelas
                </h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($guruKelasCards as $card)
                        <div class="teacher-card bg-white rounded-3xl shadow-xl overflow-hidden">
                            <div class="{{ $card['avatarClass'] }} h-36 flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-white/90 ring-4 ring-white/60 shadow-lg overflow-hidden">
                                    <img src="{{ $card['photo'] }}" alt="Foto {{ $card['role'] }}" class="w-full h-full object-cover" loading="lazy" onerror="this.remove();">
                                </div>
                            </div>
                            <div class="p-6 text-center">
                                <h4 class="text-lg font-bold text-gray-800 mb-1">{{ $card['name'] }}</h4>
                                <span class="inline-block {{ $card['badgeClass'] }} text-sm font-semibold px-4 py-1 rounded-full mb-3">{{ $card['role'] }}</span>
                                <p class="text-gray-500 text-xs mb-3">NIP: {{ $card['nip'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Guru Mapel & Penjaga -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center flex items-center justify-center gap-3">
                    <span class="text-blue-600" aria-hidden="true">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 6.5C6 5.6 7.8 5 10 5c2 0 3.8.6 5.5 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M3.5 7.5V19c0 .8.7 1.5 1.5 1.5H10V6.5c-2.4 0-4.5.4-6.5 1Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M20.5 7.5V19c0 .8-.7 1.5-1.5 1.5H14V6.5c2.4 0 4.5.4 6.5 1Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M10 6.5V20.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span> Guru Mapel & Penjaga
                </h3>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($mapelCards as $card)
                        <div class="teacher-card bg-white rounded-3xl shadow-xl overflow-hidden">
                            <div class="{{ $card['avatarClass'] }} h-36 flex items-center justify-center">
                                <div class="w-24 h-24 rounded-full bg-white/90 ring-4 ring-white/60 shadow-lg overflow-hidden">
                                    <img src="{{ $card['photo'] }}" alt="Foto {{ $card['role'] }}" class="w-full h-full object-cover" loading="lazy" onerror="this.remove();">
                                </div>
                            </div>
                            <div class="p-6 text-center">
                                <h4 class="text-lg font-bold text-gray-800 mb-1">{{ $card['name'] }}</h4>
                                <span class="inline-block {{ $card['badgeClass'] }} text-sm font-semibold px-4 py-1 rounded-full mb-3">{{ $card['role'] }}</span>
                                <p class="text-gray-500 text-xs mb-3">NIP: {{ $card['nip'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- Footer -->
   @include('partials.footer')
    <script>
        // Navbar scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) navbar.classList.add('navbar-scrolled');
            else navbar.classList.remove('navbar-scrolled');
        });
        // Mobile menu
        // Mobile menu with overlay and scroll lock
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOverlay = document.getElementById('menu-overlay');
        const closeMenuBtn = document.getElementById('close-menu');
        const mobileMenuLinks = mobileMenu.querySelectorAll('.nav-link');

        function openMenu() {
            mobileMenu.classList.add('active');
            menuOverlay.classList.add('active');
            mobileMenuBtn.classList.add('active');
            document.body.classList.add('menu-open');
        }

        function closeMenu() {
            mobileMenu.classList.remove('active');
            menuOverlay.classList.remove('active');
            mobileMenuBtn.classList.remove('active');
            document.body.classList.remove('menu-open');
        }

        mobileMenuBtn.addEventListener('click', openMenu);
        closeMenuBtn.addEventListener('click', closeMenu);
        menuOverlay.addEventListener('click', closeMenu);

        // Close menu when clicking on a link
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Close menu on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                closeMenu();
            }
        });
    </script>
</body>
</html>















