<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - SD N 3 Srikandang</title>
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
@keyframes fadeInUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
        .fade-in { animation: fadeInUp 0.8s ease-out forwards; }
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
    $heroImage = asset('assets/img/gambar sekolah.jpeg');
@endphp
@include('partials.page-hero', [
    'title' => 'Tentang Sekolah',
    'subtitle' => 'Mengenal SD N 3 Srikandang lebih dekat',
    'image' => $heroImage,
])
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">SD N 3 Srikandang</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg font-medium">
                        SD N 3 Srikandang adalah institusi pendidikan yang berkomitmen untuk membentuk generasi unggul dengan karakter yang kuat, prestasi akademik yang cemerlang, dan akhlak yang mulia.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg font-medium">
                        Dengan pengalaman puluhan tahun dalam dunia pendidikan, kami telah melahirkan ribuan alumni yang sukses di berbagai bidang. Kami percaya bahwa setiap anak memiliki potensi luar biasa yang perlu digali dan dikembangkan.
                    </p>
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-green-600">
                            <h4 class="font-bold text-xl text-green-600 mb-3">Visi</h4>
                            <p class="text-gray-600 font-medium">Terwujudnya peserta didik yang beriman, cerdas, terampil, mandiri, berkebhinekaan global serta cinta lingkungan.</p>
                        </div>
                        <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-emerald-600">
                            <h4 class="font-bold text-xl text-emerald-600 mb-3">Misi</h4>
                            <ul class="text-gray-600 font-medium space-y-2">
                                <li>&#x2705; Menumbuhkan pemahaman terhadap ajaran agama yang dianut untuk memperkuat budi pekerti yang luhur serta bertanggung jawab kepada tuhan, diri sendiri dan orangtua.</li>
                                <li>&#x2705; Mengembangkan sistem pembelajaran dan bimbingan secara efektif, kreatif, inovasi, menyenangkan sehingga tercipta SDM yang unggul bidang akademik dan non akademik.</li>
                                <li>&#x2705; Menjamin kerjasama dengan lembaga lain yang memiliki kepedulian terhadap dunia pendidikan serta melibatkan tokoh agama, tokoh pemuda, dunia industri dan dunia usaha.</li>
                                <li>&#x2705; Menanamkan kepedulian sosial dan lingkungan, tanggung jawab, cinta damai, cinta tanah air, semangat kebangsaan, dan hidup demokratis.</li>
                            </ul>
                            </div>
                        </div>
                    </div>
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-green-500 to-emerald-700 rounded-3xl h-64 transform -rotate-6 shadow-2xl relative overflow-hidden">
                            <img src="{{ asset('assets/img/tentang-upacara-1.jpeg') }}" alt="Kegiatan upacara" class="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async">
                            <div class="absolute inset-0 bg-black/10" aria-hidden="true"></div>
                        </div>
                        <div class="bg-gradient-to-br from-emerald-500 to-lime-600 rounded-3xl h-64 transform rotate-6 shadow-2xl mt-8 relative overflow-hidden">
                            <img src="{{ asset('assets/img/tentang-olahraga-2.jpeg') }}" alt="Kegiatan olahraga" class="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async">
                            <div class="absolute inset-0 bg-black/10" aria-hidden="true"></div>
                        </div>
                        <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-3xl h-64 transform rotate-3 shadow-2xl -mt-12 relative overflow-hidden">
                            <img src="{{ asset('assets/img/tentang-ruang-kelas.jpeg') }}" alt="Suasana ruang kelas" class="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async">
                            <div class="absolute inset-0 bg-black/10" aria-hidden="true"></div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-3xl h-64 transform -rotate-3 shadow-2xl -mt-4 relative overflow-hidden">
                            <img src="{{ asset('assets/img/tentang-lapangan.jpeg') }}" alt="Lapangan upacara" class="absolute inset-0 w-full h-full object-cover" loading="lazy" decoding="async">
                            <div class="absolute inset-0 bg-black/10" aria-hidden="true"></div>
                        </div>
                            </div>
                        </div>
                    </div>
            <!-- Info Cards -->
            <div class="bg-white rounded-3xl shadow-xl p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Informasi Sekolah</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white" aria-hidden="true">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                <path d="M3 10 12 3l9 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.5 10.5V21h15V10.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 21v-6a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div><p class="text-gray-500 text-sm">Nama Sekolah</p><p class="font-bold text-gray-800">SD Negeri 3 Srikandang</p></div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 bg-emerald-50 rounded-2xl">
                        <div class="w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center text-white" aria-hidden="true">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                <path d="M12 22s7-4.5 7-11a7 7 0 1 0-14 0c0 6.5 7 11 7 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div><p class="text-gray-500 text-sm">Alamat</p><p class="font-bold text-gray-800">Jl. Pendidikan No. 123, Srikandang, Kudus</p></div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 bg-yellow-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white" aria-hidden="true">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                <path d="M12 14a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.5 13.5 9 22l3-2 3 2-1.5-8.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div><p class="text-gray-500 text-sm">Akreditasi</p><p class="font-bold text-gray-800">B (Baik)</p></div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 bg-blue-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white" aria-hidden="true">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                <path d="M7 3v2M17 3v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4 8h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M6 5h12a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M8 12h.01M12 12h.01M16 12h.01M8 16h.01M12 16h.01M16 16h.01" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div><p class="text-gray-500 text-sm">Tahun Berdiri</p><p class="font-bold text-gray-800">1985</p></div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white" aria-hidden="true">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                <path d="M16 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 20a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 20a6 6 0 0 0-5.2-5.94" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3.2 20a6 6 0 0 1 5.2-5.94" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div><p class="text-gray-500 text-sm">Jumlah Siswa</p><p class="font-bold text-gray-800">56 Siswa Aktif</p></div>
                    </div>
                    <div class="flex items-center space-x-4 p-4 bg-orange-50 rounded-2xl">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white" aria-hidden="true">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                                <path d="M6 10.5 12 7l6 3.5-6 3.5-6-3.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M6 10.5V15l6 3.5 6-3.5v-4.5" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M4 9.5 12 5l8 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 10.5v5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div><p class="text-gray-500 text-sm">Tenaga Pendidik</p><p class="font-bold text-gray-800">9 Guru & Staf</p></div>
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









