{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', "{{ config('services.google.analytics_id') }}");
    </script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Saung Angklung Udjo</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
            .container {
        max-width: 1152px !important;
        max-height: 2048px !important;
        /* ... dst */
    }
        /* ... (Tetap biarkan style original Anda di sini) ... */

    /* Tambahkan class khusus ini untuk Gambar PNG */
    .angklung-animation {
        /* Menggunakan nama animasi 'sway' dari style ori Anda */
        animation: sway 1.2s ease-in-out infinite;
        /* Titik tumpu di bawah agar goyangan natural seperti angklung asli */
        transform-origin: bottom center;
    }
        .bamboo-small {
            width: 10px;
            height: 60px;
            background: linear-gradient(to bottom,
                    #fde68a,
                    #fbbf24,
                    #b45309);
            border-radius: 999px;
            animation: sway 1.2s ease-in-out infinite;
            transform-origin: bottom center;
        }

        .bamboo-small::after {
            content: '';
            display: block;
            width: 100%;
            height: 6px;
            background-color: rgba(0, 0, 0, 0.15);
            margin: 10px 0;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        @keyframes sway {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(6deg);
            }
        }

        html {
            scroll-behavior: smooth;
        }

        /* Efek dasar: konten sembunyi di bawah & transparan */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s cubic-bezier(0.2, 1, 0.3, 1);
        }

        /* Ketika kena scroll: konten naik & muncul */
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Efek khusus untuk gambar: muncul sambil membesar sedikit */
        .reveal-zoom {
            opacity: 0;
            transform: scale(0.9);
            transition: all 1s ease-out;
        }

        .reveal-zoom.active {
            opacity: 1;
            transform: scale(1);
        }

        body.menu-open {
            overflow: hidden;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #D97706; #22185d;
            transition: width 0.3s, left 0.3s;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
            left: 0;
        }

        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .navbar-transparent {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(6px);
        }

        .navbar-solid {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
    </style>

    @stack('styles')
</head>

<body class="font-sans antialiased">



<div id="bamboo-loader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-amber-900/95">
    <div class="flex flex-col items-center">
        <img 
            src="partners/ANGKLUNG.png"
            class="w-28 md:w-36 angklung-animation" 
            alt="Loading"
        >
        
        <p class="text-amber-100/50 mt-4 text-sm tracking-widest uppercase animate-pulse">
            Loading
        </p>
    </div>
</div>
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 w-full navbar-transparent z-50 transition-all duration-300">

        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">


                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <!-- Ganti circle dengan gambar -->
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="{{ asset('images/logosaung.jpeg') }}" alt="Logo Saung Angklung Udjo"
                            class="w-full h-full object-cover">
                    </div>
                    <!-- Text Logo -->
                    <div>
                        <div class="font-bold text-amber-600 text-lg leading-tight">Saung Angklung</div>
                        <div class="text-amber-600 text-sm">Udjo</div>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active text-amber-600' : 'text-gray-700 hover:text-amber-600' }} font-medium">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'active text-amber-600' : 'text-gray-700 hover:text-amber-600' }} font-medium">
                        Tentang Kami
                    </a>
                    <a href="{{ route('shows.index') }}"
                        class="nav-link {{ request()->routeIs('shows.*') ? 'active text-amber-600' : 'text-gray-700 hover:text-amber-600' }} font-medium">
                        Pertunjukan
                    </a>
                    <a href="{{ route('gallery.index') }}"
                        class="nav-link {{ request()->routeIs('gallery.*') ? 'active text-amber-600' : 'text-gray-700 hover:text-amber-600' }} font-medium">
                        Galeri
                    </a>
                    <a href="{{ route('articles.index') }}"
                        class="nav-link {{ request()->routeIs('articles.*') ? 'active text-amber-600' : 'text-gray-700 hover:text-amber-600' }} font-medium">
                        Artikel
                    </a>
                    <a href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'active text-amber-600' : 'text-gray-700 hover:text-amber-600' }} font-medium">
                        Kontak
                    </a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="{{ route('shows.index') }}"
                        class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-full font-semibold transition transform hover:scale-105">
                        LOGIN
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-64 h-full bg-white shadow-2xl z-50 md:hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <span class="font-bold text-amber-900 text-lg">Menu</span>
                <button id="close-menu-btn" class="text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="flex flex-col gap-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-amber-600 font-medium py-2">Beranda</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-amber-600 font-medium py-2">Tentang
                    Kami</a>
                <a href="{{ route('shows.index') }}"
                    class="text-gray-700 hover:text-amber-600 font-medium py-2">Pertunjukan</a>
                <a href="{{ route('products.index') }}"
                    class="text-gray-700 hover:text-amber-600 font-medium py-2">Produk</a>
                <a href="{{ route('gallery.index') }}"
                    class="text-gray-700 hover:text-amber-600 font-medium py-2">Galeri</a>
                <a href="{{ route('articles.index') }}"
                    class="text-gray-700 hover:text-amber-600 font-medium py-2">Artikel</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-amber-600 font-medium py-2">Kontak</a>
                <a href="{{ route('shows.index') }}"
                    class="bg-amber-600 text-white text-center px-6 py-3 rounded-full font-semibold mt-4">
                    Booking Sekarang
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-20">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

<footer class="bg-[#22185d] text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8 mb-8">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-white/20">
                        <img src="{{ asset('images/logosaung.jpeg') }}" alt="Logo Saung Angklung Udjo"
                            class="w-full h-full object-cover">
                    </div>

                    <div>
                        <div class="font-bold text-amber-600 text-lg leading-tight">Saung Angklung</div>
                        <div class="text-amber-600 text-sm">Udjo</div>
                    </div>
                </div>
                <p class="text-blue-100/70 text-sm">
                    Melestarikan dan mengembangkan budaya Sunda untuk kesejahteraan masyarakat.
                </p>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-4 text-white">Link Cepat</h3>
                <ul class="space-y-2 text-blue-100/70">
                    <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-amber-400 transition">Tentang Kami</a></li>
                    <li><a href="{{ route('shows.index') }}" class="hover:text-amber-400 transition">Pertunjukan</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-amber-400 transition">Produk</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-4 text-white">Kontak</h3>
                <ul class="space-y-3 text-blue-100/70 text-sm">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-amber-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Jl. Padasuka 118, Bandung 40192
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        +62 22 727 1714
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        info@angklung-udjo.co.id
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-4 text-white">Ikuti Kami</h3>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-amber-500 text-white rounded-full flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-amber-500 text-white rounded-full flex items-center justify-center transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    </div>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8 text-center text-blue-100/50 text-sm">
            <p>&copy; {{ date('Y') }} Saung Angklung Udjo. All rights reserved.</p>
            <p class="mt-2">Developed for Indonesian Culture</p>
        </div>
    </div>
</footer>
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/40 z-40 hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- 1. SELEKTOR ---
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMenuBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            const navbar = document.getElementById('navbar');
            const progressBar = document.getElementById("scroll-progress");
            const reveals = document.querySelectorAll(".reveal, .reveal-zoom");

            // --- 2. LOGIKA MENU MOBILE ---
            const toggleMenu = (isOpen) => {
                mobileMenu.classList.toggle('active', isOpen);
                overlay.classList.toggle('hidden', !isOpen);
                document.body.classList.toggle('menu-open', isOpen);
            };

            mobileMenuBtn?.addEventListener('click', () => toggleMenu(true));
            closeMenuBtn?.addEventListener('click', () => toggleMenu(false));
            overlay?.addEventListener('click', () => toggleMenu(false));

            // --- 3. LOGIKA SCROLL (DIPADUKAN) ---
            // Gabungkan Navbar, Progress Bar, dan Reveal dalam satu event listener
            window.addEventListener('scroll', () => {
                const scrollPos = window.scrollY;

                // A. Navbar Effect
                if (scrollPos > 50) {
                    navbar?.classList.replace('navbar-transparent', 'navbar-solid');
                } else {
                    navbar?.classList.replace('navbar-solid', 'navbar-transparent');
                }

                // B. Scroll Progress Bar
                if (progressBar) {
                    const height = document.documentElement.scrollHeight - document.documentElement
                        .clientHeight;
                    const scrolled = (scrollPos / height) * 100;
                    progressBar.style.width = scrolled + "%";
                }

                // C. Reveal on Scroll
                reveals.forEach(el => {
                    const elementTop = el.getBoundingClientRect().top;
                    const elementVisible = 150;
                    if (elementTop < window.innerHeight - elementVisible) {
                        el.classList.add("active", "show");
                    }
                });
            }, {
                passive: true
            }); // Tambahkan passive agar scroll lebih mulus di HP

            // Jalankan reveal sekali saat awal load
            window.dispatchEvent(new Event('scroll'));

            // --- 4. BAMBOO LOADER ---
            window.addEventListener('load', () => {
                const loader = document.getElementById('bamboo-loader');
                if (loader) {
                    setTimeout(() => {
                        loader.style.opacity = '0';
                        loader.style.pointerEvents = 'none';
                        setTimeout(() => loader.remove(), 500); // Hapus dari DOM setelah fade out
                    }, 400);
                }
            });
        });
        
    </script>


</body>

</html>
