

{{-- resources/views/gallery/index.blade.php (FRONTEND) --}}
@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<!-- Hero -->
<section class="relative h-96 flex items-center justify-center bg-gradient-to-br from-amber-700 to-amber-900">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-5xl md:text-6xl font-bold mb-4">Galeri</h1>
        <p class="text-xl md:text-2xl">Momen Indah di Saung Angklung Udjo</p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('gallery.index') }}" 
               class="px-6 py-3 rounded-full font-semibold transition {{ $type === 'all' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-amber-50' }}">
                Semua
            </a>
            <a href="{{ route('gallery.index', ['type' => 'photo']) }}" 
               class="px-6 py-3 rounded-full font-semibold transition {{ $type === 'photo' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-amber-50' }}">
                Foto
            </a>
            <a href="{{ route('gallery.index', ['type' => 'video']) }}" 
               class="px-6 py-3 rounded-full font-semibold transition {{ $type === 'video' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-amber-50' }}">
                Video
            </a>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galleries as $item)
            <div class="group cursor-pointer" data-gallery-item="{{ $item->id }}">
                <div class="relative aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                    @if($item->type === 'photo')
                        <img src="{{ asset('storage/' . $item->file_path) }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @else
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                                 alt="{{ $item->title }}" 
                                 class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                            <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                </svg>
                            </div>
                        </div>
                    @endif

                    <!-- Overlay with title -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end">
                        <div class="p-4 text-white w-full">
                            <h3 class="font-bold text-lg">{{ $item->title }}</h3>
                            @if($item->description)
                            <p class="text-sm text-gray-200 line-clamp-2">{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($galleries->hasPages())
        <div class="mt-12">
            {{ $galleries->links() }}
        </div>
        @endif

    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
    <button id="close-lightbox" class="absolute top-8 right-8 text-white hover:text-amber-400 transition z-50">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    
    <div id="lightbox-content" class="max-w-6xl w-full"></div>
</div>

@endsection

@push('scripts')
<script>
    // Lightbox
    const lightbox = document.getElementById('lightbox');
    const lightboxContent = document.getElementById('lightbox-content');
    const closeLightbox = document.getElementById('close-lightbox');

    document.querySelectorAll('[data-gallery-item]').forEach(item => {
        item.addEventListener('click', () => {
            // Get data from item
            const img = item.querySelector('img');
            const title = item.querySelector('h3')?.textContent || '';
            
            lightboxContent.innerHTML = `
                <img src="${img.src}" alt="${title}" class="w-full h-auto rounded-lg shadow-2xl">
                <h3 class="text-white text-2xl font-bold mt-4 text-center">${title}</h3>
            `;
            
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
        });
    });

    closeLightbox.addEventListener('click', () => {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
        }
    });
</script>
@endpush