{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero Section -->

    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <iframe id="heroYouTubeVideo"
                class="absolute top-1/2 left-1/2 w-[100vw] h-[56.25vw] min-h-[100vh] min-w-[177.77vh] -translate-x-1/2 -translate-y-1/2"
                src="https://www.youtube.com/embed/TMmAfWH3x_8?enablejsapi=1&autoplay=1&mute=1&loop=1&playlist=TMmAfWH3x_8&controls=0&modestbranding=1&rel=0"
                frameborder="0" allow="autoplay; encrypted-media">
            </iframe>
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <!-- Teks -->
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in text-white/90 drop-shadow-lg">
                Sejarah
            </h1>
            <p class="text-xl md:text-2xl mb-8 animate-fade-in-delay text-white/70 drop-shadow-sm">
                58 Tahun Melestarikan Budaya Sunda
            </p>
        </div>


        <!-- Tombol Play Audio di pojok kanan bawah -->
        <button id="playAudioBtn"
            class="fixed bottom-10 right-10 z-50 bg-amber-600 px-5 py-3 rounded-full font-bold hover:bg-amber-700 transition flex items-center gap-2 text-white">
            <span id="speakerIcon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
                        clip-rule="evenodd" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                </svg>
            </span>
            <span id="playAudioText">Nyalakan Suara</span>
        </button>



        <!-- Scroll Indicator -->

    </section>

    <!-- Introduction -->
    <section class="py-24 bg-white relative overflow-hidden">


        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <span
                    class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-amber-700 uppercase bg-amber-50 rounded-full reveal">
                    Warisan Budaya Dunia
                </span>

                <div class="relative mb-10 reveal">
                    <h2 class="text-4xl md:text-6xl font-extrabold text-amber-900 leading-tight">
                        Saung Angklung Udjo
                    </h2>
                    <div class="mt-4 w-24 h-1.5 bg-amber-600 mx-auto rounded-full"></div>
                </div>

                <div class="space-y-6 reveal">
                    <p class="text-xl text-gray-700 leading-relaxed font-medium">
                        Saung Angklung Udjo (SAU) hadir sebagai sebuah <span class="text-amber-800 font-bold">laboratorium
                            budaya</span> yang menyatukan harmoni pertunjukan, pusat kerajinan tangan, hingga pusat edukasi
                        instrumen musik bambu.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed italic">
                        "Didirikan pada tahun 1966 oleh <span class="font-semibold text-gray-800">Udjo Ngalagena</span> dan
                        <span class="font-semibold text-gray-800">Uum Sumiati</span>, sebagai wujud dedikasi seumur hidup
                        untuk menjaga napas seni dan kebudayaan tradisional Sunda agar tetap abadi."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mang Udjo Profile -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid md:grid-cols-2 gap-12 items-center">

                    <div class="relative">
                        <img src="/images/udjo-2.png" alt="Mang Udjo" class="rounded-2xl shadow-2xl">
                        <div class="absolute -bottom-6 -right-6 bg-amber-600 text-white p-8 rounded-xl shadow-xl">
                            <div class="text-center">
                                <p class="text-sm mb-1">1929 - 2001</p>
                                <p class="text-3xl font-bold">Udjo Ngalagena</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-4xl font-bold text-amber-900 mb-6">Udjo Ngalagena (Mang Udjo)</h2>

                        <div class="space-y-4 text-gray-700 leading-relaxed">
                            <p>
                                Dilahirkan pada tanggal <strong>5 Maret 1929</strong> yang merupakan putra keenam
                                dari pasangan Wiranta dan Imi. Pada usia antara empat sampai lima tahun,
                                Udjo kecil sudah akrab dengan angklung berlaras pelog dan salendro.
                            </p>

                            <p>
                                Selain belajar angklung, ia juga mempelajari pencak silat, gamelan dan lagu-lagu
                                daerah dalam bentuk kawih dan tembang. Bakat serta kemampuannya makin berkembang
                                ketika ia mulai terjun sebagai guru kesenian di beberapa sekolah di Bandung.
                            </p>

                            <p>
                                Hasrat dan kecintaannya pada seni dan budaya menjadi alasan utama bagi
                                Udjo Ngalagena dan istrinya Uum Sumiati untuk mendirikan Saung Angklung Udjo (SAU).
                            </p>

                            <p>
                                Sepeninggal Udjo Ngalagena <strong>(03 Mei 2001)</strong>, SAU mulai diteruskan
                                oleh para putra-putri. Tak ada yang berubah, SAU tetap ramai dikunjungi para
                                turis dalam dan luar negeri.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

{{-- Vision & Mission Section --}}
    <section class="py-20 bg-gradient-to-b from-amber-50 to-white overflow-hidden relative">
        {{-- Fade Out Overlay Top --}}
        <div
            class="absolute top-0 left-0 right-0 h-40 bg-gradient-to-b from-white via-white to-transparent pointer-events-none z-10">
        </div>

        <div class="container mx-auto px-4 relative z-20">
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                {{-- Vision Card --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 reveal transition-all duration-500 transform hover:shadow-2xl hover:-translate-y-2">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">Visi</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Menjadi kawasan budaya Sunda khususnya budaya bambu yang mendunia
                        untuk mewujudkan wisata unggulan di Indonesia.
                    </p>
                </div>

                {{-- Mission Card --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 reveal transition-all duration-500 transform hover:shadow-2xl hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">Misi</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Melestarikan dan mengembangkan budaya Sunda dengan basis filosofi Mang Udjo,
                        yaitu gotong royong antar warga dan pelestarian lingkungan untuk kesejahteraan masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </section>


{{-- Timeline --}}
    <section class="py-24 bg-white overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-40 bg-gradient-to-b from-white via-white/80 to-transparent z-20 pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-30">
            <div class="text-center mb-20 reveal">
                <h2 class="text-4xl md:text-5xl font-black text-amber-900 mb-4">Perjalanan Kami</h2>
                <p class="text-lg text-gray-600 font-medium">58 Tahun Perjalanan Melestarikan Budaya Sunda</p>
            </div>

            <div class="max-w-6xl mx-auto relative">
                <div
                    class="absolute left-6 md:left-1/2 transform md:-translate-x-1/2 h-full w-2.5 bg-gradient-to-b from-amber-300 via-amber-500 to-amber-300 rounded-full opacity-70">
                </div>

                <div class="space-y-16 md:space-y-24">
                    @foreach ([['year' => '1966', 'title' => 'Pendirian SAU', 'desc' => 'Mang Udjo dan Uum Sumiati mendirikan SAU di Jalan Padasuka 118, Bandung.'], ['year' => '1970s', 'title' => 'Pusat Kerajinan', 'desc' => 'Pengembangan workshop instrumen musik dan pusat kerajinan tangan dari bambu.'], ['year' => '1990s', 'title' => 'Go International', 'desc' => 'Mulai memperkenalkan keindahan angklung ke panggung pertunjukan internasional.'], ['year' => '2010', 'title' => 'Warisan UNESCO', 'desc' => 'Angklung diakui secara resmi oleh UNESCO sebagai Warisan Budaya Takbenda Dunia.'], ['year' => '2024', 'title' => 'Era Digital', 'desc' => 'Transformasi pelayanan dengan sistem booking online untuk wisatawan dunia.']] as $index => $item)
                        <div class="relative flex items-center reveal {{ $index % 2 != 0 ? 'md:flex-row-reverse' : '' }}">

                            <div class="w-[calc(100%-4rem)] md:w-[42%] ml-auto md:ml-0">
                                <div
                                    class="bg-white rounded-[2rem] shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 group border border-amber-50">
                                    <div class="p-6 md:p-8">
                                        <span
                                            class="text-amber-700 font-black text-xl mb-1 block">{{ $item['year'] }}</span>
                                        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $item['title'] }}</h3>
                                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">{{ $item['desc'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="absolute left-[19px] md:left-1/2 transform md:-translate-x-1/2 z-20">
                                <div class="w-7 h-3 bg-amber-800 rounded-full border border-amber-200 shadow-sm"></div>
                            </div>

                            <div class="hidden md:block w-[42%]"></div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
  
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">Mengapa Memilih Kami?</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">

                <div class="text-center group p-6 rounded-2xl hover:bg-amber-50 transition duration-300">
                    <div
                        class="w-16 h-16 bg-amber-100 rounded-2xl rotate-3 flex items-center justify-center mx-auto mb-6 group-hover:bg-amber-600 group-hover:rotate-6 transition duration-300 shadow-sm">
                        <svg class="w-8 h-8 text-amber-600 group-hover:text-white transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Autentik & Original</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pengalaman budaya Sunda yang autentik langsung dari sumbernya
                    </p>
                </div>

                <div class="text-center group p-6 rounded-2xl hover:bg-green-50 transition duration-300">
                    <div
                        class="w-16 h-16 bg-green-100 rounded-2xl -rotate-3 flex items-center justify-center mx-auto mb-6 group-hover:bg-green-600 group-hover:-rotate-6 transition duration-300 shadow-sm">
                        <svg class="w-8 h-8 text-green-600 group-hover:text-white transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Interaktif & Edukatif</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Tidak hanya menonton, tapi ikut bermain dan belajar angklung
                    </p>
                </div>

                <div class="text-center group p-6 rounded-2xl hover:bg-blue-50 transition duration-300">
                    <div
                        class="w-16 h-16 bg-blue-100 rounded-2xl rotate-3 flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:rotate-6 transition duration-300 shadow-sm">
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Warisan UNESCO</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Bagian dari Warisan Budaya Takbenda UNESCO sejak 2010
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-gradient-to-r from-amber-600 to-amber-800 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Kunjungi Saung Angklung Udjo</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Rasakan pengalaman budaya Sunda yang tak terlupakan bersama keluarga
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shows.index') }}"
                    class="inline-block bg-white text-amber-600 hover:bg-amber-50 px-10 py-4 rounded-full font-bold text-lg transition transform hover:scale-105">
                    Lihat Jadwal Pertunjukan
                </a>
                <a href="{{ route('contact') }}"
                    class="inline-block bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-10 py-4 rounded-full font-bold text-lg transition border-2 border-white">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Script Play Audio -->
    <script>
        // Memanggil API YouTube
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('heroYouTubeVideo', {
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady(event) {
            const btn = document.getElementById('playAudioBtn');
            const icon = document.getElementById('speakerIcon');
            const text = document.getElementById('playAudioText');

            btn.addEventListener('click', () => {
                if (player.isMuted()) {
                    // Aktifkan Suara
                    player.unMute();
                    text.textContent = "Suara Aktif";
                    btn.classList.replace("bg-amber-600", "bg-green-600");

                    icon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 animate-pulse">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                </svg>`;
                } else {
                    // Matikan Suara (Mute)
                    player.mute();
                    text.textContent = "Nyalakan Suara";
                    btn.classList.replace("bg-green-600", "bg-amber-600");

                    icon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                </svg>`;
                }
            });
        }
    </script>

@endsection
