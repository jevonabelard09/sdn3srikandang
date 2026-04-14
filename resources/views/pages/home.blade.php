<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Quicksand', sans-serif; overflow-x: hidden; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
        .animated-bg { background-size: 400% 400%; animation: gradientShift 15s ease infinite; }
        @keyframes gradientShift { 0%{background-position:0% 50%} 50%{background-position:100% 50%} 100%{background-position:0% 50%} }
        @keyframes float { 0%,100%{transform:translateY(0px)} 50%{transform:translateY(-20px)} }
        .float { animation: float 3s ease-in-out infinite; }
        @keyframes fadeInUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
        .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .delay-1{animation-delay:.2s;opacity:0} .delay-2{animation-delay:.4s;opacity:0} .delay-3{animation-delay:.6s;opacity:0}
        .card-hover { transition: all 0.4s cubic-bezier(0.175,0.885,0.32,1.275); }
        .card-hover:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
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
        @keyframes pulse { 0%,100%{box-shadow:0 0 0 0 rgba(34,197,94,0.7)} 50%{box-shadow:0 0 0 15px rgba(34,197,94,0)} }
        .btn-pulse { animation: pulse 2s infinite; }
        
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
        .hero-gradient { background: #ffffff; }
.teacher-card { transition: all 0.3s ease; }
        .teacher-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .avatar-1{background:linear-gradient(135deg,#667eea,#764ba2)}
        .avatar-2{background:linear-gradient(135deg,#f093fb,#f5576c)}
        .avatar-3{background:linear-gradient(135deg,#4facfe,#00f2fe)}
        .avatar-4{background:linear-gradient(135deg,#43e97b,#38f9d7)}
        .avatar-5{background:linear-gradient(135deg,#fa709a,#fee140)}
        .avatar-6{background:linear-gradient(135deg,#a18cd1,#fbc2eb)}
        .avatar-7{background:linear-gradient(135deg,#fccb90,#d57eeb)}
        .avatar-8{background:linear-gradient(135deg,#84fab0,#8fd3f4)}
        .avatar-9{background:linear-gradient(135deg,#fd7043,#ffca28)}
    </style>
    <title>Beranda - SD N 3 Srikandang</title>
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

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden hero-gradient">
        <img src="{{ asset('assets/img/gambar%20sekolah.jpeg') }}" alt="Foto sekolah" class="absolute inset-0 w-full h-full object-cover pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/35 to-black/15"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex justify-center">
                <div class="text-white text-center w-full max-w-4xl -ml-2 md:-ml-4">
                    <h2 class="text-5xl md:text-6xl font-bold mb-6 fade-in-up">
                        Selamat Datang
                        <span class="block text-yellow-300">SD N 3 Srikandang</span>
                    </h2>
                    <p class="text-xl mb-8 text-gray-100 fade-in-up delay-1">
                        Membentuk karakter unggul, cerdas, dan berakhlak mulia untuk masa depan gemilang Indonesia
                    </p>
                    <div class="flex flex-wrap justify-center gap-4 fade-in-up delay-2">
                        <a href="{{ route('tentang') }}" class="bg-white text-green-700 px-8 py-4 rounded-full font-semibold hover:bg-lime-200 hover:text-green-800 transition transform hover:scale-105 btn-pulse">
                            Pelajari Lebih Lanjut
                        </a>
                            </div>
                        </div>
                    </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 md:p-12 shadow-xl border border-green-100/60">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div class="flex justify-center md:justify-start">
                        <div class="w-56 h-56 md:w-64 md:h-64 rounded-full bg-white ring-4 ring-white/70 shadow-2xl overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('assets/img/kepala_sekolah-removebg-preview.png') }}" alt="Kepala Sekolah SD N 3 Srikandang" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Sambutan Kepala Sekolah</h3>
                        <p class="text-gray-700 leading-relaxed text-lg mb-6 font-medium">
                            Assalamu'alaikum warahmatullahi wabarakatuh. Selamat datang di website SD N 3 Srikandang.
                            Kami berkomitmen memberikan layanan pendidikan yang berkualitas, aman, dan menyenangkan
                            untuk membentuk karakter peserta didik yang beriman, cerdas, dan berprestasi.
                        </p>
                        <p class="text-gray-700 leading-relaxed text-lg mb-8 font-medium">
                            Melalui website ini, kami berharap informasi sekolah dapat diakses dengan mudah oleh orang tua,
                            peserta didik, dan masyarakat. Terima kasih atas dukungan dan kerja sama semua pihak.
                            Wassalamu'alaikum warahmatullahi wabarakatuh.
                        </p>
                            </div>
                        </div>
                    </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-green-100 to-emerald-100 opacity-50"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center bg-white/85 backdrop-blur rounded-2xl p-6 shadow-lg border border-white/60">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center text-white" style="background: var(--primary);">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M16 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 20a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 20a6 6 0 0 0-5.2-5.94" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.2 20a6 6 0 0 1 5.2-5.94" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-green-700 mb-1">56</div>
                    <div class="text-gray-600 font-medium">Siswa Aktif</div>
                </div>
                <div class="text-center bg-white/85 backdrop-blur rounded-2xl p-6 shadow-lg border border-white/60">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center text-white" style="background: var(--primary);">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M6 10.5 12 7l6 3.5-6 3.5-6-3.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M6 10.5V15l6 3.5 6-3.5v-4.5" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M4 9.5 12 5l8 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 10.5v5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-emerald-700 mb-1">9</div>
                    <div class="text-gray-600 font-medium">Guru & Tenaga Pendidik</div>
                </div>
                <div class="text-center bg-white/85 backdrop-blur rounded-2xl p-6 shadow-lg border border-white/60">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center text-white" style="background: var(--primary);">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 2.5 19.5 6v7.2c0 5-3.4 8.6-7.5 9.8-4.1-1.2-7.5-4.8-7.5-9.8V6L12 2.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="m9.2 12.3 2 2.1 3.8-4.2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-yellow-600 mb-1">B</div>
                    <div class="text-gray-600 font-medium">Akreditasi</div>
                </div>
                <div class="text-center bg-white/85 backdrop-blur rounded-2xl p-6 shadow-lg border border-white/60">
                    <div class="w-12 h-12 mx-auto mb-4 rounded-xl flex items-center justify-center text-white" style="background: var(--primary);">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M7 3v2M17 3v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 8h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M6 5h12a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M8 12h.01M12 12h.01M16 12h.01M8 16h.01M12 16h.01M16 16h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-bold text-orange-600 mb-1">1985</div>
                    <div class="text-gray-600 font-medium">Tahun Berdiri</div>
                            </div>
                        </div>
                    </div>
    </section>

    <!-- Quick Links -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Jelajahi Sekolah Kami</h2>
                <div class="w-24 h-1 mx-auto rounded-full" style="background: var(--primary);"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <a href="{{ route('tentang') }}" class="card-hover rounded-3xl p-8 text-white shadow-xl text-center block" style="background: var(--primary);">
                    <div class="mb-4 flex justify-center"><img src="{{ asset('assets/icons/tentang.svg') }}" alt="Tentang Sekolah" class="w-14 h-14 opacity-90" style="filter: drop-shadow(0 8px 12px rgba(0,0,0,0.25));"></div>
                    <h3 class="text-xl font-bold mb-2">Tentang Sekolah</h3>
                    <p class="text-white/90 text-sm">Visi, misi, dan profil sekolah kami</p>
                </a>
                <a href="{{ route('guru') }}" class="card-hover rounded-3xl p-8 text-white shadow-xl text-center block" style="background: var(--primary);">
                    <div class="mb-4 flex justify-center"><img src="{{ asset('assets/icons/guru.svg') }}" alt="Tenaga Pendidik" class="w-14 h-14 opacity-90" style="filter: drop-shadow(0 8px 12px rgba(0,0,0,0.25));"></div>
                    <h3 class="text-xl font-bold mb-2">Tenaga Pendidik</h3>
                    <p class="text-white/90 text-sm">Kenali guru-guru berdedikasi kami</p>
                </a>
                <a href="{{ route('program') }}" class="card-hover rounded-3xl p-8 text-white shadow-xl text-center block" style="background: var(--primary);">
                    <div class="mb-4 flex justify-center"><img src="{{ asset('assets/icons/program.svg') }}" alt="Program Unggulan" class="w-14 h-14 opacity-90" style="filter: drop-shadow(0 8px 12px rgba(0,0,0,0.25));"></div>
                    <h3 class="text-xl font-bold mb-2">Program Unggulan</h3>
                    <p class="text-white/90 text-sm">Program terbaik untuk siswa kami</p>
                </a>
                <a href="{{ route('prestasi') }}" class="card-hover rounded-3xl p-8 text-white shadow-xl text-center block" style="background: var(--primary);">
                    <div class="mb-4 flex justify-center"><img src="{{ asset('assets/icons/prestasi.svg') }}" alt="Prestasi" class="w-14 h-14 opacity-90" style="filter: drop-shadow(0 8px 12px rgba(0,0,0,0.25));"></div>
                    <h3 class="text-xl font-bold mb-2">Prestasi</h3>
                    <p class="text-white/90 text-sm">Pencapaian membanggakan siswa kami</p>
                </a>
                <a href="{{ route('galeri') }}" class="card-hover rounded-3xl p-8 text-white shadow-xl text-center block" style="background: var(--primary);">
                    <div class="mb-4 flex justify-center"><img src="{{ asset('assets/icons/galeri.svg') }}" alt="Galeri" class="w-14 h-14 opacity-90" style="filter: drop-shadow(0 8px 12px rgba(0,0,0,0.25));"></div>
                    <h3 class="text-xl font-bold mb-2">Galeri</h3>
                    <p class="text-white/90 text-sm">Dokumentasi kegiatan sekolah</p>
                </a>
                <a href="{{ route('kontak') }}" class="card-hover rounded-3xl p-8 text-white shadow-xl text-center block" style="background: var(--primary);">
                    <div class="mb-4 flex justify-center"><img src="{{ asset('assets/icons/kontak.svg') }}" alt="Hubungi Kami" class="w-14 h-14 opacity-90" style="filter: drop-shadow(0 8px 12px rgba(0,0,0,0.25));"></div>
                    <h3 class="text-xl font-bold mb-2">Hubungi Kami</h3>
                    <p class="text-white/90 text-sm">Kami siap membantu Anda</p>
                </a>
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








