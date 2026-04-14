<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - SD N 3 Srikandang</title>
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
        .card-hover { transition: all 0.4s cubic-bezier(0.175,0.885,0.32,1.275); }
        .card-hover:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
        
        /* Mobile Menu Improvements */
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
                    <a href="{{ route('program') }}" class="nav-link text-gray-700 hover:text-green-600 font-medium transition {{ request()->routeIs('program') ? 'active' : '' }}" @if (request()->routeIs('program')) aria-current="page" @endif>Program</a>
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

    @php
    $heroImage = asset('assets/img/gambar sekolah.jpeg');
@endphp
@include('partials.page-hero', [
    'title' => 'Galeri Kegiatan',
    'subtitle' => 'Dokumentasi SD N 3 Srikandang',
    'image' => $heroImage,
])
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">            @php
                $fallbackImage = asset('assets/img/gambar%20sekolah.jpeg');
                $placeholders = [
                    'Kegiatan Belajar Mengajar',
                    'Ekstrakurikuler Olahraga',
                    'Kegiatan Seni & Budaya',
                    'Upacara & Perayaan',
                    'Kunjungan Edukatif',
                    'Lomba & Kompetisi',
                ];
            @endphp

            <div class="grid md:grid-cols-3 gap-6 mb-6">
                @forelse ($images as $img)
                    <div class="card-hover rounded-2xl overflow-hidden shadow-xl h-64 bg-gray-100 relative">
                        <img src="{{ asset('storage/' . $img->path) }}" alt="{{ $img->title ?? 'Galeri' }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <p class="font-semibold">{{ $img->title ?? 'Foto Kegiatan' }}</p>
                            @if ($img->category)
                                <p class="text-xs text-white/80">{{ $img->category }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    @foreach ($placeholders as $title)
                        <div class="card-hover rounded-2xl overflow-hidden shadow-xl h-64 bg-gray-100 relative">
                            <img src="{{ $fallbackImage }}" alt="{{ $title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/35"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <p class="font-semibold">{{ $title }}</p>
                                <p class="text-xs text-white/80">Foto sementara (gambar sekolah)</p>
                            </div>
                        </div>
                    @endforeach
                @endforelse
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










