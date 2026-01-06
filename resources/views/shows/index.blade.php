{{-- resources/views/shows/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Jadwal & Harga Tiket - Saung Angklung Udjo')

@section('content')

<style>
       .animate-fade-in {
                animation: fade-in 1s ease-out;
            }

            .animate-fade-in-delay {
                animation: fade-in 1s ease-out 0.3s both;
            }

            .animate-fade-in-delay-2 {
                animation: fade-in 1s ease-out 0.6s both;
            }

</style>
<!-- Hero Section -->
 {{-- 1. HERO SECTION (Wajib menggunakan h-[150vh] atau h-[200vh] agar efek sticky terasa) --}}
<section class="relative h-[150vh] bg-[#22185d]"> 
    <div id="heroSection" class="sticky top-0 h-screen w-full flex items-center justify-center overflow-hidden group z-0">
        
        {{-- Container Background --}}
        <div class="absolute inset-0 z-0" id="bgContainer">
            {{-- Tambahkan Overlay Gelap agar teks/tombol lebih terlihat --}}
            <div class="absolute inset-0 bg-black/30 z-10"></div>

            <div class="absolute inset-0 bg-cover bg-center opacity-100 transition-opacity duration-1000"
                style="background-image: url('images/BG_Pertunjukan.JPG');"></div>

            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('/images/habibie.jpg');"></div>

            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('/img/calung.jpg');"></div>

            <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
                style="background-image: url('/img/orkes.jpg');"></div>
        </div>

        {{-- Navigasi Tombol --}}
        <button id="prevBtn"
            class="absolute left-6 top-1/2 -translate-y-1/2 z-30 bg-white/10 hover:bg-white/30 text-white p-4 rounded-full backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all duration-300 transform hover:scale-110">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button id="nextBtn"
            class="absolute right-6 top-1/2 -translate-y-1/2 z-30 bg-white/10 hover:bg-white/30 text-white p-4 rounded-full backdrop-blur-md opacity-0 group-hover:opacity-100 transition-all duration-300 transform hover:scale-110">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        {{-- Indikator Dots --}}
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-30 flex gap-3" id="dotsContainer">
            <button class="h-1.5 rounded-full transition-all duration-500 bg-white w-8 dot-btn" data-index="0"></button>
            <button class="h-1.5 rounded-full transition-all duration-500 bg-white/40 w-3 dot-btn" data-index="1"></button>
            <button class="h-1.5 rounded-full transition-all duration-500 bg-white/40 w-3 dot-btn" data-index="2"></button>
            <button class="h-1.5 rounded-full transition-all duration-500 bg-white/40 w-3 dot-btn" data-index="3"></button>
        </div>
    </div>
</section>


<!-- Booking Options -->
<section class="py-20 bg-gradient-to-b from-amber-50 to-white">
    <div class="container mx-auto px-4">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-amber-900 mb-4">Cara Pemesanan</h2>
            <p class="text-gray-600 text-lg">Pilih metode pemesanan yang sesuai untuk Anda</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            
            <!-- Individual -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition border border-gray-100">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Kunjungan Individu</h3>
                    <p class="text-gray-600">Untuk keluarga atau grup kecil (< 20 orang)</p>
                </div>

                <ul class="space-y-3 mb-6 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Tanpa minimum peserta</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Booking online mudah & cepat</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Konfirmasi instan</span>
                    </li>
                </ul>

                <a href="https://www.traveloka.com/id-id/activities/indonesia/product/tiket-saung-angklung-udjo-2000858975309" 
                   target="_blank"
                   class="block w-full bg-gray-900 hover:bg-black text-white text-center py-4 rounded-xl font-bold transition">
                    Booking via Traveloka
                </a>
            </div>

            <!-- Group -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-8 shadow-lg text-white relative overflow-hidden">
                <div class="absolute -right-6 -bottom-6 opacity-10 transform rotate-12">
                    <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.481 8.415-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.305-1.654l.361.214a9.87 9.87 0 005.031 1.378h.005c5.448 0 9.882-4.437 9.885-9.885.002-2.64-1.029-5.122-2.893-6.988-1.865-1.866-4.348-2.897-6.988-2.897a9.888 9.888 0 00-9.888 9.884c0 2.096.547 4.142 1.588 5.945l-.235-.374-3.741.982.998-3.648-.361-.214z"/>
                    </svg>
                </div>

                <div class="text-center mb-6 relative z-10">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">Reservasi Rombongan</h3>
                    <p class="text-green-100">Untuk grup 20+ orang (sekolah, instansi, travel)</p>
                </div>

                <ul class="space-y-3 mb-6 text-sm text-green-100 relative z-10">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Harga khusus grup & paket makan</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Jadwal fleksibel sesuai kebutuhan</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Konsultasi gratis</span>
                    </li>
                </ul>

                <a href="https://wa.me/6282182821200?text=Halo%20Admin%2C%20saya%20ingin%20reservasi%20rombongan" 
                   target="_blank"
                   class="relative z-10 flex items-center justify-center gap-2 w-full bg-white text-green-600 text-center py-4 rounded-xl font-bold hover:bg-green-50 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-gradient-to-r from-amber-600 to-amber-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Merasakan Pengalaman Budaya?</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto opacity-90">
            Booking tiket sekarang dan jadilah bagian dari harmoni bambu yang memukau!
        </p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-white text-amber-600 hover:bg-amber-50 px-10 py-4 rounded-full font-bold text-lg transition transform hover:scale-105 shadow-xl">
            Lihat Lokasi & Kontak
        </a>
    </div>
</section>

<script>
   document.addEventListener('DOMContentLoaded', () => {
    // 1. CAROUSEL HERO SECTION
    function initCarousel() {
        let currentIndex = 0;
        const totalSlides = 4;
        let autoTimer = null;
        let resetTimer = null;

        const bgContainer = document.getElementById('bgContainer');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const dotsContainer = document.getElementById('dotsContainer');

        if (!bgContainer || !nextBtn || !prevBtn || !dotsContainer) return;

        function updateSlide() {
            // Memilih hanya DIV yang memiliki background-image agar tidak salah hitung DIV overlay
            const bgs = bgContainer.querySelectorAll('div[style*="background-image"]');
            bgs.forEach((bg, i) => {
                bg.style.opacity = i === currentIndex ? '1' : '0';
                bg.style.transition = 'opacity 1s ease-in-out';
            });

            const dots = dotsContainer.querySelectorAll('.dot-btn');
            dots.forEach((dot, i) => {
                if (i === currentIndex) {
                    dot.classList.add('w-8', 'bg-white');
                    dot.classList.remove('w-2', 'bg-white/50', 'w-3');
                } else {
                    dot.classList.remove('w-8', 'bg-white');
                    dot.classList.add('w-2', 'bg-white/50');
                }
            });
        }

        function next() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlide();
        }

        function prev() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlide();
        }

        function startAutoPlay() {
            clearInterval(autoTimer);
            autoTimer = setInterval(next, 6000);
        }

        function resetAutoPlay() {
            clearInterval(autoTimer);
            clearTimeout(resetTimer);
            resetTimer = setTimeout(startAutoPlay, 10000);
        }

        nextBtn.addEventListener('click', () => { next(); resetAutoPlay(); });
        prevBtn.addEventListener('click', () => { prev(); resetAutoPlay(); });

        dotsContainer.querySelectorAll('.dot-btn').forEach(dot => {
            dot.addEventListener('click', (e) => {
                currentIndex = parseInt(e.currentTarget.dataset.index);
                updateSlide();
                resetAutoPlay();
            });
        });

        updateSlide();
        startAutoPlay();
    }

    // 2. REVEAL ON SCROLL (Animasi Muncul saat Scroll)
    function initReveal() {
        const reveals = document.querySelectorAll('.reveal, .reveal-zoom');
        
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        reveals.forEach(el => revealObserver.observe(el));
    }

    // 3. NAVBAR GLASSMORPHISM (Berubah saat Scroll)
    function initNavbar() {
        const nav = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('navbar-solid');
                nav.classList.remove('navbar-transparent');
            } else {
                nav.classList.add('navbar-transparent');
                nav.classList.remove('navbar-solid');
            }
        });
    }

 

    // Jalankan semua fungsi
    initCarousel();
    initReveal();
    initNavbar();
    initLoader();
});
        </script>

@endsection