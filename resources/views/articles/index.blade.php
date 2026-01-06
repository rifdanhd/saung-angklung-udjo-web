{{-- resources/views/articles/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Artikel & Berita - Saung Angklung Udjo')

@section('content')

<!-- Hero Section -->
<section class="relative h-[50vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-amber-900/90 to-amber-700/90 z-10"></div>
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/articles-hero.jpg');"></div>
    
    <div class="relative z-20 text-center text-white px-4 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Artikel & Berita</h1>
        <p class="text-lg md:text-xl">Update terbaru tentang kegiatan dan budaya Saung Angklung Udjo</p>
    </div>
</section>

<!-- Articles Section -->
<section class="py-16 bg-gradient-to-b from-white to-amber-50">
    <div class="container mx-auto px-4">
        
        <!-- Filter & Search -->
        <div class="mb-12 bg-white rounded-2xl shadow-lg p-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Category Filter -->
                <div class="flex flex-wrap gap-3">
                    <button class="category-btn active px-6 py-2 rounded-full font-semibold transition" data-category="all">
                        Semua Artikel
                    </button>
                    <button class="category-btn px-6 py-2 rounded-full font-semibold transition" data-category="berita">
                        Berita
                    </button>
                    <button class="category-btn px-6 py-2 rounded-full font-semibold transition" data-category="event">
                        Event
                    </button>
                    <button class="category-btn px-6 py-2 rounded-full font-semibold transition" data-category="budaya">
                        Budaya
                    </button>
                    <button class="category-btn px-6 py-2 rounded-full font-semibold transition" data-category="tips">
                        Tips & Tutorial
                    </button>
                </div>
                
                <!-- Search Box -->
                <div class="relative w-full md:w-auto">
                    <input type="text" 
                           placeholder="Cari artikel..." 
                           class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <svg class="absolute left-3 top-3 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        
        <!-- Articles Grid -->
        <div class="grid md:grid-cols-3 gap-8" id="articles-grid">
            @forelse($articles as $article)
                <article class="article-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 group" 
                         data-category="{{ $article->category }}">
                    
                    <a href="{{ route('articles.show', $article) }}" class="block">
                        <!-- Article Image -->
                        <div class="relative h-56 overflow-hidden bg-gradient-to-br from-amber-200 to-amber-400">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-7xl">
                                    📰
                                </div>
                            @endif
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/90 backdrop-blur-sm text-amber-800 shadow-md">
                                    {{ ucfirst($article->category) }}
                                </span>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="p-6">
                            <!-- Date & Author -->
                            <div class="flex items-center gap-4 mb-3 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $article->published_at->format('d M Y') }}
                                </span>
                                @if($article->author)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        {{ $article->author }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-amber-600 transition line-clamp-2 min-h-[56px]">
                                {{ $article->title }}
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3 min-h-[72px]">
                                {{ $article->excerpt ?? Str::limit($article->content, 120) }}
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="text-amber-600 font-semibold group-hover:gap-2 flex items-center transition-all">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                                
                                @if($article->views_count ?? false)
                                    <span class="flex items-center gap-1 text-gray-400 text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        {{ $article->views_count }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <div class="col-span-3 text-center py-16">
                    <div class="text-6xl mb-4">📝</div>
                    <p class="text-gray-500 text-lg">Belum ada artikel tersedia</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="mt-12">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gradient-to-r from-amber-600 to-amber-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Dapatkan Update Terbaru</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">
            Berlangganan newsletter kami untuk mendapatkan artikel dan berita terbaru
        </p>
        <form class="max-w-md mx-auto flex gap-3">
            <input type="email" 
                   placeholder="Masukkan email Anda" 
                   class="flex-1 px-6 py-3 rounded-full focus:outline-none text-gray-900">
            <button type="submit" 
                    class="bg-white text-amber-600 hover:bg-amber-50 px-8 py-3 rounded-full font-bold transition">
                Subscribe
            </button>
        </form>
    </div>
</section>

@endsection

@push('styles')
<style>
    .category-btn {
        background-color: #f3f4f6;
        color: #6b7280;
    }
    
    .category-btn:hover {
        background-color: #fef3c7;
        color: #92400e;
    }
    
    .category-btn.active {
        background-color: #d97706;
        color: white;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
    // Category filter functionality
    document.querySelectorAll('.category-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            const articles = document.querySelectorAll('.article-card');
            
            articles.forEach(article => {
                if (category === 'all' || article.dataset.category === category) {
                    article.style.display = 'block';
                } else {
                    article.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush