{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Saung Angklung Udjo - Warisan Budaya Sunda')

@section('content')
    {{-- CSS --}}
    @push('styles')
        <style>
            .partner-link {
    display: flex;
    align-items: center;
    justify-content: center;
}

.partner-link img {
    max-height: 64px;
    filter: grayscale(100%);
    transition: all 0.3s ease;
}

.partner-link:hover img {
    filter: grayscale(0%);
    transform: scale(1.05);
}

            /* --- 1. ANIMASI KEYFRAMES --- */
            /* Animasi muncul (fade in) */
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Animasi melayang (floating) */
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            /* --- 2. KELAS ANIMASI OTOMATIS (Page Load) --- */
            .animate-fade-in {
                animation: fade-in 1s ease-out;
            }

            .animate-fade-in-delay {
                animation: fade-in 1s ease-out 0.3s both;
            }

            .animate-fade-in-delay-2 {
                animation: fade-in 1s ease-out 0.6s both;
            }

            /* --- 3. EFEK REVEAL (Triggered by Scroll) --- */
            .reveal {
                opacity: 0;
                transform: translateY(60px);
                transition: all 1s cubic-bezier(0.22, 1, 0.36, 1);
                will-change: transform, opacity;
                /* Optimasi GPU */
            }

            .reveal.active {
                opacity: 1;
                transform: translateY(0);
            }

            /* --- 4. HOVER EFFECTS --- */
            /* Efek melayang saat group di-hover */
            .group:hover .transform-float {
                animation: float 2s ease-in-out infinite;
            }

            /* --- 5. UTILITY CLASSES --- */
            /* Menghilangkan scrollbar */
            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            /* Potong teks 2 baris */
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Transisi halus untuk section z-30 */
            section.z-30 {
                transition: transform 0.3s ease-out;
                will-change: transform;
            }
        </style>
    @endpush

    <!-- Hero Section -->
    {{-- 1. HERO SECTION (Dibuat Sticky agar tertimpa) --}}
    <div class="relative h-screen">
        <section id="heroSection" class="sticky top-0 h-screen flex items-center justify-center overflow-hidden group z-0">
         <div class="absolute inset-0 z-0" id="bgContainer">
    <div class="absolute inset-0 bg-cover bg-center opacity-60 transition-opacity duration-1000"
        style="background-image: url('/images/hero-bg.jpg');"></div>

    <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
        style="background-image: url('/images/habibie.jpg');"></div>

    <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
        style="background-image: url('/img/calung.jpg');"></div>

    <div class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
        style="background-image: url('/img/orkes.jpg');"></div>
</div>


           <div class="absolute inset-0 bg-gradient-to-r from-amber-900/50 to-amber-700/50 z-10"></div>

            <div id="heroContent"
                class="relative z-20 text-center text-white px-4 max-w-4xl mx-auto transition-all duration-500">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">Saung Angklung Udjo</h1>
                <p class="text-xl md:text-2xl mb-8 animate-fade-in-delay">Lestarikan Budaya Sunda Melalui Harmoni Bambu</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-delay-2">
                    <a href="{{ route('shows.index') }}"
                        class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-full font-semibold">Lihat
                        Pertunjukan</a>
                    <a href="{{ route('about') }}"
                        class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-full font-semibold border-2 border-white">Tentang
                        Kami</a>
                </div>
            </div>

            <button id="prevBtn"
                class="absolute left-6 top-1/2 -translate-y-1/2 z-30 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBtn"
                class="absolute right-6 top-1/2 -translate-y-1/2 z-30 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <div class="absolute bottom-32 left-1/2 -translate-x-1/2 z-20 flex gap-2" id="dotsContainer">
                <button class="h-2 rounded-full transition-all duration-300 bg-white w-8 dot-btn" data-index="0"></button>
                <button class="h-2 rounded-full transition-all duration-300 bg-white/50 w-2 dot-btn"
                    data-index="1"></button>
                <button class="h-2 rounded-full transition-all duration-300 bg-white/50 w-2 dot-btn"
                    data-index="2"></button>
                <button class="h-2 rounded-full transition-all duration-300 bg-white/50 w-2 dot-btn"
                    data-index="3"></button>
            </div>
        </section>
    </div>

 {{-- 2. INFORMASI KUNJUNGAN --}}
{{-- 2. INFORMASI KUNJUNGAN --}}
{{-- Section untuk menampilkan informasi jam operasional dan harga tiket --}}
<section
    class="relative z-30 py-16 bg-gradient-to-br from-[#22185d] via-[#1a124a] to-[#120c35] text-white shadow-[0_-50px_100px_rgba(0,0,0,0.5)]  overflow-visible">
    {{-- relative: positioning context untuk elemen absolute di dalamnya --}}
    {{-- z-30: layer tinggi agar section ini di atas elemen lain --}}
    {{-- py-16: padding vertikal untuk spacing --}}
    {{-- bg-gradient-to-br: gradient dari kiri-atas ke kanan-bawah dengan warna ungu gelap --}}
    {{-- text-white: semua teks default berwarna putih --}}
    {{-- shadow: bayangan besar ke atas untuk efek depth --}}
    {{-- rounded-t: sudut melengkung di atas (3rem mobile, 5rem desktop) --}}
    {{-- -mt-20: margin top negatif untuk overlap dengan section sebelumnya --}}
    {{-- overflow-visible: agar bayangan dan efek tidak terpotong --}}

    {{-- Overlay tekstur tipis untuk menambah kedalaman visual --}}
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/dark-leather.png')] opacity-20 rounded-t-[3rem] md:rounded-t-[5rem]"></div>
    {{-- absolute inset-0: menutupi seluruh area section --}}
    {{-- bg-[url()]: tekstur kulit gelap dari transparenttextures.com --}}
    {{-- opacity-20: transparansi 20% agar tidak terlalu dominan --}}
    {{-- rounded-t: mengikuti border radius section parent --}}

    {{-- EFEK FADE OUT DI BAWAH: Membuat transisi ke section selanjutnya menjadi mulus --}}
    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-white via-transparent to-transparent z-10 opacity-10"></div>
    {{-- absolute bottom-0: posisi di bagian bawah section --}}
    {{-- w-full h-32: lebar penuh, tinggi 32 (8rem) --}}
    {{-- bg-gradient-to-t: gradient dari bawah ke atas --}}
    {{-- from-white via-transparent: mulai putih, jadi transparan --}}
    {{-- z-10: layer di atas background tapi di bawah konten --}}
    {{-- opacity-10: sangat tipis untuk efek halus --}}

    {{-- Container utama untuk konten --}}
    <div class="container mx-auto px-4 relative z-20 text-center">
        {{-- container: max-width responsif --}}
        {{-- mx-auto: center horizontal --}}
        {{-- px-4: padding horizontal --}}
        {{-- relative z-20: positioning context, layer di atas overlay --}}
        {{-- text-center: semua teks rata tengah --}}

        {{-- Header section --}}
        <h2 class="reveal text-3xl md:text-4xl font-bold mb-12 uppercase tracking-[0.2em] text-white drop-shadow-md">
            {{-- reveal: class untuk animasi scroll (didefinisikan di JavaScript) --}}
            {{-- text-3xl md:text-4xl: ukuran font 3xl mobile, 4xl desktop --}}
            {{-- font-bold: ketebalan teks bold --}}
            {{-- mb-12: margin bottom untuk jarak dengan konten --}}
            {{-- uppercase: semua huruf kapital --}}
            {{-- tracking-[0.2em]: letter spacing 0.2em untuk efek premium --}}
            {{-- drop-shadow-md: bayangan teks untuk kedalaman --}}
            
            <span class="text-amber-500">Informasi Kunjungan</span>
            {{-- text-amber-500: warna amber/emas untuk kata "Kunjungan" sebagai aksen --}}
        </h2>

        {{-- Grid container untuk 3 kolom informasi --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-lg md:divide-x md:divide-white/10 items-start">
            {{-- grid: display grid --}}
            {{-- grid-cols-1: 1 kolom di mobile --}}
            {{-- md:grid-cols-3: 3 kolom di desktop --}}
            {{-- gap-12: jarak antar kolom --}}
            {{-- text-lg: ukuran teks default large --}}
            {{-- md:divide-x: garis vertikal pemisah antar kolom di desktop --}}
            {{-- md:divide-white/10: warna garis putih dengan opacity 10% --}}
            {{-- items-start: align items ke atas --}}

            {{-- KOLOM 1: JAM OPERASIONAL --}}
            <div class="reveal flex flex-col items-center gap-4 px-4">
                {{-- reveal: animasi scroll --}}
                {{-- flex flex-col: flexbox vertikal --}}
                {{-- items-center: center horizontal --}}
                {{-- gap-4: jarak antar elemen flex --}}
                {{-- px-4: padding horizontal --}}

                {{-- Icon container dengan efek hover --}}
                <div class="p-4 bg-amber-500/10 backdrop-blur-sm rounded-xl mb-2 border border-amber-500/20 transition-transform hover:scale-105 duration-300">
                    {{-- p-4: padding di semua sisi --}}
                    {{-- bg-amber-500/10: background amber dengan opacity 10% --}}
                    {{-- backdrop-blur-sm: efek blur pada background di belakang --}}
                    {{-- rounded-2xl: border radius besar --}}
                    {{-- mb-2: margin bottom --}}
                    {{-- border border-amber-500/20: border amber tipis --}}
                    {{-- transition-transform: animasi smooth untuk transform --}}
                    {{-- hover:scale-105: scale up 105% saat hover --}}
                    {{-- duration-300: durasi animasi 300ms --}}

                    {{-- SVG icon jam --}}
                    <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {{-- w-8 h-8: ukuran 8x8 (2rem) --}}
                        {{-- text-amber-500: warna amber --}}
                        {{-- fill="none": tidak ada fill, hanya stroke --}}
                        {{-- stroke="currentColor": stroke menggunakan warna text --}}
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        {{-- path untuk menggambar icon jam dengan jarum --}}
                    </svg>
                </div>

                {{-- Label kolom --}}
                <span class="font-bold uppercase text-medium tracking-[0.3em] text-amber-400">Jam Operasional</span>
                {{-- font-semibold: ketebalan semi-bold --}}
                {{-- uppercase: huruf kapital --}}
                {{-- text-xs: ukuran teks extra small --}}
                {{-- tracking-[0.3em]: letter spacing lebar --}}
                {{-- text-amber-500/90: warna amber dengan opacity 90% --}}

                {{-- Container informasi jam --}}
                <div class="flex flex-col text-sm text-blue-50/80 leading-relaxed">
                    {{-- flex flex-col: flexbox vertikal --}}
                    {{-- text-sm: ukuran teks small --}}
                    {{-- text-blue-50/80: warna biru terang dengan opacity 80% --}}
                    {{-- leading-relaxed: line height yang lebih longgar --}}

                    <span class="font-medium">Senin – Jumat</span>
                    {{-- font-medium: ketebalan medium --}}
                    
                    <span class="text-white text-lg font-bold">09:00 – 17:00</span>
                    {{-- text-white: warna putih penuh --}}
                    {{-- text-lg: ukuran lebih besar untuk jam --}}
                    {{-- font-bold: ketebalan bold untuk emphasis --}}
                    
                    <div class="h-px w-8 bg-white/20 my-2 mx-auto"></div>
                    {{-- h-px: tinggi 1px untuk garis pemisah --}}
                    {{-- w-8: lebar 8 (2rem) --}}
                    {{-- bg-white/20: warna putih dengan opacity 20% --}}
                    {{-- my-2: margin vertical --}}
                    {{-- mx-auto: center horizontal --}}
                    
                    <span class="font-medium">Sabtu – Minggu</span>
                    <span class="text-white text-lg font-bold">08:00 – 18:00</span>
                </div>
            </div>

            {{-- KOLOM 2: TIKET DOMESTIK --}}
            <div class="reveal flex flex-col items-center gap-4 px-4" style="transition-delay: 200ms;">
                {{-- style="transition-delay: 200ms;": delay animasi reveal 200ms untuk efek stagger --}}

                {{-- Icon container tiket --}}
                <div class="p-4 bg-amber-500/10 backdrop-blur-sm rounded-2xl mb-2 border border-amber-500/20 transition-transform hover:scale-105 duration-300">
                    {{-- SVG icon tiket --}}
                    <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                        {{-- path untuk menggambar icon tiket dengan perforasi --}}
                    </svg>
                </div>

                {{-- Label tiket domestik --}}
                <span class="font-bold uppercase text-medium tracking-[0.3em] text-amber-400">Tiket Domestik</span>
                {{-- text-amber-400: warna amber lebih terang --}}

                {{-- Container harga --}}
                <div class="space-y-4">
                    {{-- space-y-4: jarak vertikal 4 antar child elements --}}

                    {{-- Harga dewasa --}}
                    <div>
                        <div class="text-3xl font-black text-white ">Rp 85.000</div>
                        {{-- text-3xl: ukuran besar untuk harga --}}
                        {{-- font-black: ketebalan extra bold --}}
                        {{-- italic: gaya miring untuk efek dinamis --}}
                        
                        <div class="text-[20px] text-blue-100/50 tracking-widest">Dewasa</div>
                        {{-- text-[10px]: ukuran custom 10px --}}
                        {{-- text-blue-100/50: biru terang dengan opacity 50% --}}
                        {{-- tracking-widest: letter spacing paling lebar --}}
                    </div>

                    {{-- Harga anak --}}
                    <div>
                        <div class="text-3xl font-bold text-white/90">Rp 60.000</div>
                        {{-- text-2xl: sedikit lebih kecil dari harga dewasa --}}
                        {{-- text-white/90: putih dengan opacity 90% --}}
                        
                        <div class="text-[15px] text-blue-100/50  tracking-widest">Anak (3-12 thn)</div>
                    </div>
                </div>
            </div>

            {{-- KOLOM 3: INTERNATIONAL TICKET --}}
            <div class="reveal flex flex-col items-center gap-4 px-4" style="transition-delay: 400ms;">
                {{-- style="transition-delay: 400ms;": delay animasi 400ms untuk efek stagger bertahap --}}

                {{-- Icon container globe --}}
                <div class="p-4 bg-amber-500/10 backdrop-blur-sm rounded-2xl mb-2 border border-amber-500/20 transition-transform hover:scale-105 duration-300">
                    {{-- SVG icon globe/dunia --}}
                    <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        {{-- path untuk menggambar icon globe dengan garis latitude/longitude --}}
                    </svg>
                </div>

                {{-- Label international ticket --}}
                <span class="font-bold uppercase text-small tracking-[0.2em] text-amber-400">International Ticket</span>

                {{-- Container harga internasional --}}
                <div class="space-y-4">
                    {{-- Harga adult --}}
                    <div>
                        <div class="text-3xl font-black text-white">Rp 120.000</div>
                        <div class="text-[15px] text-blue-100/50 tracking-widest">Dewasa</div>
                    </div>

                    {{-- Harga children --}}
                    <div>
                        <div class="text-3xl font-bold text-white/90">Rp 85.000</div>
                        <div class="text-[15px] text-blue-100/50  tracking-widest">Anak (3-12 tahun)</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


    <!-- About Preview Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">

                <!-- Text Content -->
                <div class="order-2 md:order-1">
@if($location)
    <div class="inline-flex items-center gap-2 px-3 py-1 mb-4 rounded-full bg-amber-50 border border-amber-200 animate-fade-in">
        <span class="flex h-2 w-2 rounded-full bg-green-500"></span>
        <span class="text-xs font-semibold text-amber-800 uppercase tracking-wider">
            Visiting from {{ $location->countryName }}, {{ $location->cityName }}
        </span>
    </div>
@endif

                    <h2 class="text-3xl md:text-5xl font-bold mb-6 drop-shadow-medium bg-gradient-to-r from-amber-400 to-amber-800 bg-clip-text text-transparent">
    Warisan Budaya Sunda
</h2>

                    <p class="text-gray-600 text-lg mb-4 leading-relaxed">
                        Didirikan pada tahun <strong>1966</strong> oleh <strong>Udjo Ngalagena (Mang Udjo)</strong> dan
                        istrinya <strong>Uum Sumiati</strong>, Saung Angklung Udjo adalah pusat pelestarian seni dan budaya
                        tradisional Sunda, khususnya angklung.
                    </p>

                    <p class="text-gray-600 text-lg mb-4 leading-relaxed">
                        Kami tidak hanya menyajikan pertunjukan, tetapi juga menjadi laboratorium kependidikan dan pusat
                        belajar untuk generasi mendatang.
                    </p>




                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-amber-500 drop-shadow-xl">58+</div>
                            <div class="text-sm text-gray-600">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-amber-500">100K+</div>
                            <div class="text-sm text-gray-600">Pengunjung/Tahun</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-amber-500">50+</div>
                            <div class="text-sm text-gray-600">Negara</div>
                        </div>
                    </div>
                    

                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 bg-[#22185d] hover:bg-[#22185d] text-white px-6 py-3 rounded-full font-semibold transition transform hover:scale-105 shadow-lg">
                        Pelajari Lebih Lanjut
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                
                <!-- Image Section -->
                <div class="relative order-1 md:order-2">
                    <!-- Main Image -->
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="/images/habibie.jpg" alt="Mang Udjo" class="w-full h-auto">

                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                        <!-- Badge on image - positioned better for mobile -->
                        <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6 md:right-auto">
                            <div class="bg-white/95 backdrop-blur-sm p-4 md:p-5 rounded-xl shadow-xl inline-block">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-2xl md:text-3xl font-bold text-gray-900">Sejak 1996</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div
                        class="hidden md:block absolute -top-6 -right-6 w-24 h-24 bg-amber-200 rounded-full opacity-50 -z-10">
                    </div>
                    <div
                        class="hidden md:block absolute -bottom-6 -left-6 w-32 h-32 bg-orange-200 rounded-full opacity-50 -z-10">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Alternative: Carousel Version -->
    <section class="py-20 bg-gradient-to-b from-white to-amber-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-amber-400 to-amber-800 bg-clip-text text-transparent mb-4">Pertunjukan yang Dapat Anda Temukan</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Geser untuk melihat ragam pertunjukan budaya Sunda
                </p>
            </div>

            <!-- Swiper Carousel (if you want to use carousel) -->
            <div class="relative max-w-6xl mx-auto">
                <div class="overflow-x-auto hide-scrollbar">
                    <div class="flex gap-6 pb-6">
                        @foreach ([['img' => 'orkes.jpg', 'title' => 'Orkestra Angklung', 'desc' => 'Harmoni musik bambu dalam orkestra'], ['img' => 'topeng.jpg', 'title' => 'Tari Topeng', 'desc' => 'Tarian klasik dengan topeng ekspresif'], ['img' => 'performance.jpg', 'title' => 'Tarian Tradisional', 'desc' => 'Tarian khas Sunda yang anggun'], ['img' => 'golek.jpg', 'title' => 'Wayang Golek', 'desc' => 'Seni pertunjukan boneka kayu'], ['img' => 'helaran.jpg', 'title' => 'Helaran', 'desc' => 'Arak-arakan tradisional yang meriah'], ['img' => 'calung.jpg', 'title' => 'Calung & Arumba', 'desc' => 'Alunan musik bambu yang menenangkan']] as $show)
                            <div
                                class="flex-shrink-0 w-[360px] sm:w-[420px] bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                                <div class="relative h-48 sm:h-52 overflow-hidden">
                                    <img src="{{ asset('img/' . $show['img']) }}" alt="{{ $show['title'] }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                </div>

                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-amber-900 mb-2">
                                        {{ $show['title'] }}
                                    </h3>
                                    <p class="text-gray-600 text-sm">
                                        {{ $show['desc'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Shows Section -->

    <section class="py-20 bg-gradient-to-b from-white to-amber-50">
        <div class="container mx-auto px-4">

            <div class="text-center mb-12 max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">
                    Jadwal Pertunjukan
                </h2>
                <p class="text-gray-600 text-lg">
                    Nikmati berbagai ragam seni budaya Sunda dan Nusantara dalam 60-90 menit pertunjukan yang dipersembahkan
                    para seniman Saung Angklung Udjo. Rasakan keseruan bermain angklung bersama dan bergembira bersama
                    seluruh siswa Saung Angklung Udjo.
                </p>
            </div>
            {{-- Tiket Senin-jumat --}}
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 ">
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('img/performance.jpg') }}" alt="Senin - Jumat"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Senin - Jumat</h3>
                        <p class="text-gray-600 mb-5 text-sm leading-relaxed">Pertunjukan rutin harian dengan berbagai
                            atraksi seni budaya Sunda.</p>

                        <div class="bg-amber-50/80 border border-amber-100 p-4 rounded-2xl mb-6 space-y-3">
                            <div
                                class="flex items-center gap-3 text-sm text-amber-900 font-bold border-b border-amber-200/50 pb-2">
                                <span class="bg-amber-200 text-amber-800 text-[15px] px-2 py-0.5 rounded">Sesi 1</span>
                                15.30 – 17.00 WIB
                            </div>
                        </div>


                        <div class="flex justify-center w-full mt-8">
                            <a href="{{ route('shows.index') }}"
                                class="inline-flex items-center gap-4 bg-amber-800 hover:bg-black text-white px-10 py-4 rounded-full font-black text-lg transition-all transform hover:scale-105 shadow-[0_15px_30px_-10px_rgba(146,64,14,0.5)] group">

                                <svg class="w-7 h-7 text-amber-400 group-hover:rotate-12 transition duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                    </path>
                                </svg>

                                <span>Reservasi Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Tiket Sabtu --}}
                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 ">
                    <div
                        class="absolute top-4 right-4 z-10 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        2 Sesi</div>
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('img/orkes.jpg') }}" alt="Sabtu"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Sabtu</h3>
                        <p class="text-gray-600 mb-5 text-sm">Pertunjukan akhir pekan dengan pilihan waktu fleksibel.</p>

                        <div class="bg-amber-50/80 border border-amber-100 p-4 rounded-2xl mb-6 space-y-3">
                            <div
                                class="flex items-center gap-3 text-sm text-amber-900 font-bold border-b border-amber-200/50 pb-2">
                                <span class="bg-amber-200 text-amber-800 text-[15px] px-2 py-0.5 rounded">Sesi 1</span>
                                13.00 – 14.30 WIB
                            </div>
                            <div class="flex items-center gap-3 text-sm text-amber-900 font-bold">
                                <span class="bg-amber-200 text-amber-800 text-[15px] px-2 py-0.5 rounded">Sesi 2</span>
                                15.30 – 17.00 WIB
                            </div>
                        </div>
                        <div class="flex justify-center w-full mt-8">
                            <a href="{{ route('shows.index') }}"
                                class="inline-flex items-center gap-4 bg-amber-800 hover:bg-black text-white px-10 py-4 rounded-full font-black text-lg transition-all transform hover:scale-105 shadow-[0_15px_30px_-10px_rgba(146,64,14,0.5)] group">

                                <svg class="w-7 h-7 text-amber-400 group-hover:rotate-12 transition duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                    </path>
                                </svg>

                                <span>Reservasi Sekarang</span>
                            </a>
                        </div>

                    </div>
                </div>
                {{-- Tiket Minggu --}}
                <div
                    class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 ">
                    <div
                        class="absolute top-4 right-4 z-10 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        2 Sesi</div>
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('img/helaran.jpg') }}" alt="Minggu"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Minggu</h3>
                        <p class="text-gray-600 mb-5 text-sm">Harmoni musik angklung di pagi atau sore hari.</p>

                        <div class="bg-amber-50/80 border border-amber-100 p-4 rounded-2xl mb-6 space-y-3">
                            <div
                                class="flex items-center gap-3 text-sm text-amber-900 font-bold border-b border-amber-200/50 pb-2">
                                <span class="bg-amber-200 text-amber-800 text-[15px] px-2 py-0.5 rounded">Sesi 1</span>
                                10.00 – 11.30 WIB
                            </div>
                            <div class="flex items-center gap-3 text-sm text-amber-900 font-bold">
                                <span class="bg-amber-200 text-amber-800 text-[15px] px-2 py-0.5 rounded">Sesi 2</span>
                                15.30 – 17.00 WIB
                            </div>
                        </div>


                        <div class="flex justify-center w-full mt-8">
                            <a href="{{ route('shows.index') }}"
                                class="inline-flex items-center gap-4 bg-amber-800 hover:bg-black text-white px-10 py-4 rounded-full font-black text-lg transition-all transform hover:scale-105 shadow-[0_15px_30px_-10px_rgba(146,64,14,0.5)] group">

                                <svg class="w-7 h-7 text-amber-400 group-hover:rotate-12 transition duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                    </path>
                                </svg>

                                <span>Reservasi Sekarang</span>
                            </a>
                        </div>

    </section>


    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">Berita Terbaru</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Update terbaru tentang kegiatan dan budaya Saung Angklung Udjo
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($latestArticles as $article)
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition flex flex-col h-full">

                        {{-- Bagian Gambar --}}
                        <div class="h-48 bg-gray-100 overflow-hidden">
                            @if ($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}"
                                    alt="{{ $article->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl bg-amber-50">
                                    📰
                                </div>
                            @endif
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-2xl font-bold mb-3 text-gray-800 line-clamp-2">{{ $article->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}
                            </p>

                            {{-- Link yang sudah diperbaiki ke Detail Artikel --}}
                            <div class="mt-auto">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="text-amber-600 font-bold hover:text-amber-700 inline-flex items-center gap-1 group">
                                    Baca Selengkapnya
                                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <div class="text-5xl mb-4">📭</div>
                        <p class="text-gray-500 text-lg">Belum ada artikel terbaru untuk saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    {{-- ================= Partner Section ================= --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">

        <h3 class="text-center text-xl md:text-2xl font-bold mb-10 text-gray-800">
            Dipercaya oleh 100+ Institusi
        </h3>

        <div
            class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-12
                   gap-x-3 gap-y-4 place-items-center">

            {{-- CONTOH, tinggal ulang --}}
            <img src="{{ asset('partners/garuda.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('partners/Seal_of_an_Embassy_of_the_United_States_of_America.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('partners/TutwuriHandayani.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bca.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/bni.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/mandiri.png') }}" class="logo-partner" alt="">
            <img src="{{ asset('images/logos/telkomsel.png') }}" class="logo-partner" alt="">
            {{-- sampai 100 logo --}}
        </div>

    </div>
</section>



 

@endsection

{{-- JAVA SCRIPT --}}

<script>
    (function() {
        // Gabungkan semua inisialisasi di sini
        document.addEventListener('DOMContentLoaded', () => {
            initCarousel();
            initScrollEffects();
        });

        // 1. FUNGSI CAROUSEL HERO
        function initCarousel() {
            let currentIndex = 0;
            const totalSlides = 4;
            let autoTimer = null;

            const bgContainer = document.getElementById('bgContainer');
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');
            const dotsContainer = document.getElementById('dotsContainer');

            if (!bgContainer || !nextBtn || !prevBtn || !dotsContainer) return;

            function updateSlide() {
                const bgs = bgContainer.querySelectorAll('div');
                bgs.forEach((bg, i) => {
                    bg.style.opacity = i === currentIndex ? '1' : '0';
                    bg.style.transition = 'opacity 1s ease-in-out';
                });

                const dots = dotsContainer.querySelectorAll('.dot-btn');
                dots.forEach((dot, i) => {
                    if (i === currentIndex) {
                        dot.classList.add('w-8', 'bg-white');
                        dot.classList.remove('w-2', 'bg-white/50');
                    } else {
                        dot.classList.remove('w-8', 'bg-white');
                        dot.classList.add('w-2', 'bg-white/50');
                    }
                });
            }

            function next() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlide();
                resetAutoPlay();
            }

            function prev() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlide();
                resetAutoPlay();
            }

            function startAutoPlay() {
                autoTimer = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlide();
                }, 6000);
            }

            function resetAutoPlay() {
                clearInterval(autoTimer);
                // Delay sejenak sebelum autoplay jalan lagi setelah interaksi user
                setTimeout(startAutoPlay, 10000);
            }

            nextBtn.addEventListener('click', next);
            prevBtn.addEventListener('click', prev);
            dotsContainer.querySelectorAll('.dot-btn').forEach(dot => {
                dot.addEventListener('click', (e) => {
                    currentIndex = parseInt(e.target.dataset.index);
                    updateSlide();
                    resetAutoPlay();
                });
            });

            updateSlide();
            startAutoPlay();
        }

        // 2. FUNGSI SCROLL (Reveal & Parallax)
        function initScrollEffects() {
            // Reveal on Scroll menggunakan IntersectionObserver (Lebih Efisien)
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // Parallax & Fade Hero Content
            const heroContent = document.getElementById('heroContent');
            if (heroContent) {
                window.addEventListener('scroll', () => {
                    let value = window.scrollY;
                    if (value < 600) {
                        heroContent.style.opacity = 1 - (value / 500);
                        heroContent.style.transform = `translateY(${value * 0.2}px)`;
                    }
                }, {
                    passive: true
                }); // Passive true untuk optimasi scroll
            }
        }
    })();
</script>
