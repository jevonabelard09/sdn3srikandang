<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SD N 3 Srikandang</title>
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

    @php
    $heroImage = asset('assets/img/gambar sekolah.jpeg');
@endphp
@include('partials.page-hero', [
    'title' => 'Hubungi Kami',
    'subtitle' => 'Kami siap menjawab pertanyaan Anda',
    'image' => $heroImage,
])
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-start max-w-5xl mx-auto">
                <div class="bg-white rounded-3xl shadow-2xl p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Kirim Pesan</h3>
                    <p class="text-gray-700 mb-6 font-semibold">Isi form berikut untuk menghubungi kami.</p>

                    @if (session('status'))
                        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('kontak.alt.store') }}" class="space-y-4">
                        @csrf

                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                            <input name="name" type="text" value="{{ old('name') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-yellow-200" placeholder="Nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                            <input name="email" type="email" value="{{ old('email') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-yellow-200" placeholder="nama@email.com" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Subjek</label>
                            <input name="subject" type="text" value="{{ old('subject') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-yellow-200" placeholder="Contoh: Informasi PPDB" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Pesan</label>
                            <textarea name="message" rows="5" class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-yellow-200" placeholder="Tulis pesan Anda..." required>{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="w-full rounded-xl text-white font-bold py-3 transition hover:opacity-90" style="background: var(--primary);">Kirim Pesan</button>
                    </form>
                </div>

                <div class="space-y-6">
                    <div class="bg-gradient-to-br from-green-700 to-emerald-700 rounded-3xl p-6 text-white card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-2xl flex-shrink-0">&#x1F4CD;</div>
                            <div>
                                <h4 class="font-bold text-xl mb-2">Alamat</h4>
                                <p class="text-emerald-50">Jl. Tugu Tri Angulasi Srikandang Bangsri, Kode Pos 59453</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-3xl p-6 text-white card-hover">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-2xl flex-shrink-0">&#x1F4DE;</div>
                            <div>
                                <h4 class="font-bold text-xl mb-2">Telepon</h4>
                                <p class="text-blue-100">0895-1605-7958</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-3xl p-6 text-gray-900 card-hover border border-gray-200 shadow-sm" style="background:#FFD400">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-2xl flex-shrink-0">&#x2709;&#xFE0F;</div>
                            <div>
                                <h4 class="font-bold text-xl mb-2">Email</h4>
                                <p class="text-gray-700 font-medium">sdn3srikandang@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl p-6 shadow-xl card-hover">
                        <h4 class="font-bold text-xl mb-4 text-gray-800">&#x1F552; Jam Operasional</h4>
                        <div class="space-y-2 text-gray-700 font-medium">
                            <div class="flex justify-between"><span>Senin - Kamis</span><span class="font-semibold text-green-700">07.00 - 14.00 WIB</span></div>
                            <div class="flex justify-between"><span>Jumat</span><span class="font-semibold text-green-700">07.00 - 11.00 WIB</span></div>
                            <div class="flex justify-between"><span>Sabtu</span><span class="font-semibold text-green-700">07.00 - 12.30 WIB</span></div>
                            <div class="flex justify-between"><span>Minggu</span><span class="font-semibold text-green-700">Libur</span></div>
                            </div>
                        </div>
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










