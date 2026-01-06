{{-- resources/views/articles/show.blade.php --}}
@extends('layouts.app')

@section('title', $article->title . ' - Saung Angklung Udjo')

@section('content')

<!-- Breadcrumb -->
<div class="bg-amber-50 py-4">
    <div class="container mx-auto px-4">
        <nav class="flex items-center gap-2 text-sm">
            <a href="{{ route('home') }}" class="text-amber-600 hover:text-amber-700">Home</a>
            <span class="text-gray-400">/</span>
            <a href="{{ route('articles.index') }}" class="text-amber-600 hover:text-amber-700">Artikel</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-600">{{ Str::limit($article->title, 50) }}</span>
        </nav>
    </div>
</div>

<!-- Article Content -->
<article class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Article Header -->
            <header class="mb-8">
                <!-- Category Badge -->
                <div class="mb-4">
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-bold bg-amber-100 text-amber-800">
                        {{ ucfirst($article->category) }}
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $article->title }}
                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-6 text-gray-600 pb-6 border-b border-gray-200">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $article->published_at->format('d F Y') }}</span>
                    </div>

                    @if($article->author)
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>{{ $article->author }}</span>
                        </div>
                    @endif

                    @if($article->views_count ?? false)
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>{{ $article->views_count }} views</span>
                        </div>
                    @endif

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ $article->reading_time ?? '5' }} min read</span>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="flex items-center gap-3 mt-6">
                    <span class="text-gray-600 font-medium">Bagikan:</span>
                    <div class="flex gap-2">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white hover:bg-blue-700 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-sky-500 text-white hover:bg-sky-600 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-green-600 text-white hover:bg-green-700 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            @if($article->featured_image)
                <div class="mb-10 rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/' . $article->featured_image) }}" 
                         alt="{{ $article->title }}"
                         class="w-full h-auto">
                </div>
            @endif

            <!-- Article Excerpt -->
            @if($article->excerpt)
                <div class="mb-8 p-6 bg-amber-50 border-l-4 border-amber-600 rounded-r-xl">
                    <p class="text-lg text-gray-700 italic leading-relaxed">
                        {{ $article->excerpt }}
                    </p>
                </div>
            @endif

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none mb-12">
                <div class="text-gray-700 leading-relaxed space-y-4">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>

            <!-- Tags -->
            @if($article->tags && count($article->tags) > 0)
                <div class="mb-8 pb-8 border-b border-gray-200">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-gray-600 font-medium">Tags:</span>
                        @foreach($article->tags as $tag)
                            <a href="{{ route('articles.index', ['tag' => $tag]) }}" 
                               class="px-3 py-1 bg-gray-100 hover:bg-amber-100 text-gray-700 hover:text-amber-800 rounded-full text-sm transition">
                                #{{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Author Bio -->
            @if($article->author)
                <div class="mb-12 p-6 bg-gradient-to-r from-amber-50 to-amber-100 rounded-2xl">
                    <div class="flex gap-4 items-start">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-700 rounded-full flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                            {{ substr($article->author, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $article->author }}</h3>
                            <p class="text-gray-600">
                                Penulis konten di Saung Angklung Udjo yang berdedikasi untuk melestarikan dan membagikan kekayaan budaya Sunda.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Navigation -->
            <div class="grid md:grid-cols-2 gap-6 mb-12">
                @if($previousArticle ?? false)
                    <a href="{{ route('articles.show', $previousArticle) }}" 
                       class="group p-6 bg-white border-2 border-gray-200 hover:border-amber-500 rounded-xl transition">
                        <div class="flex items-center gap-2 text-amber-600 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="text-sm font-semibold">Artikel Sebelumnya</span>
                        </div>
                        <h4 class="font-bold text-gray-900 group-hover:text-amber-600 transition line-clamp-2">
                            {{ $previousArticle->title }}
                        </h4>
                    </a>
                @endif

                @if($nextArticle ?? false)
                    <a href="{{ route('articles.show', $nextArticle) }}" 
                       class="group p-6 bg-white border-2 border-gray-200 hover:border-amber-500 rounded-xl transition text-right">
                        <div class="flex items-center justify-end gap-2 text-amber-600 mb-2">
                            <span class="text-sm font-semibold">Artikel Selanjutnya</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 group-hover:text-amber-600 transition line-clamp-2">
                            {{ $nextArticle->title }}
                        </h4>
                    </a>
                @endif
            </div>
        </div>

        <!-- Related Articles -->
        @if($relatedArticles && $relatedArticles->count() > 0)
            <div class="border-t pt-12">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Artikel Terkait</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $related)
                            <a href="{{ route('articles.show', $related) }}" 
                               class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                                <div class="relative h-48 bg-gradient-to-br from-amber-200 to-amber-400 overflow-hidden">
                                    @if($related->featured_image)
                                        <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                             alt="{{ $related->title }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-6xl">📰</div>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <span class="text-xs text-gray-500">{{ $related->published_at->format('d M Y') }}</span>
                                    <h3 class="font-bold text-lg mt-2 mb-2 line-clamp-2 group-hover:text-amber-600 transition">
                                        {{ $related->title }}
                                    </h3>
                                    <p class="text-gray-600 text-sm line-clamp-2">
                                        {{ $related->excerpt ?? Str::limit($related->content, 100) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</article>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-amber-600 to-amber-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Tertarik Mengunjungi Kami?</h2>
        <p class="text-lg mb-6 max-w-2xl mx-auto">
            Rasakan langsung pengalaman budaya yang tak terlupakan di Saung Angklung Udjo
        </p>
        <a href="{{ route('shows.index') }}" 
           class="inline-block bg-white text-amber-600 hover:bg-amber-50 px-8 py-3 rounded-full font-bold transition transform hover:scale-105">
            Booking Sekarang
        </a>
    </div>
</section>

@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .prose {
        font-size: 1.125rem;
        line-height: 1.8;
    }
    
    .prose p {
        margin-bottom: 1.5rem;
    }
</style>
@endpush