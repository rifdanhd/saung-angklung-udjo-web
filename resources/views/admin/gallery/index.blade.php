{{-- resources/views/admin/gallery/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Kelola Gallery')

@section('content')
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Kelola Gallery</h1>
            <p class="text-gray-600 mt-1">Upload foto dan video pertunjukan</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" 
           class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-lg font-semibold transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Upload Media
        </a>
    </div>
</div>

<!-- Filter Tabs -->
<div class="flex gap-4 mb-6">
    <a href="{{ route('admin.gallery.index') }}" 
       class="px-6 py-3 rounded-lg font-semibold transition {{ !request('type') ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-amber-50' }}">
        Semua ({{ $galleries->total() }})
    </a>
    <a href="{{ route('admin.gallery.index', ['type' => 'photo']) }}" 
       class="px-6 py-3 rounded-lg font-semibold transition {{ request('type') === 'photo' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-amber-50' }}">
        Foto ({{ $galleries->where('type', 'photo')->count() }})
    </a>
    <a href="{{ route('admin.gallery.index', ['type' => 'video']) }}" 
       class="px-6 py-3 rounded-lg font-semibold transition {{ request('type') === 'video' ? 'bg-amber-600 text-white' : 'bg-white text-gray-700 hover:bg-amber-50' }}">
        Video ({{ $galleries->where('type', 'video')->count() }})
    </a>
</div>

<!-- Gallery Grid -->
<div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($galleries as $item)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden group">
        <div class="relative h-48 bg-gray-200 overflow-hidden">
            @if($item->type === 'photo')
                <img src="{{ asset('storage/' . $item->file_path) }}" 
                     alt="{{ $item->title }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
            @else
                @if($item->thumbnail)
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gray-800">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                    <div class="w-16 h-16 bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                    </div>
                </div>
            @endif

            <!-- Badges -->
            <div class="absolute top-3 left-3 flex flex-col gap-2">
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-white/90 backdrop-blur-sm
                    {{ $item->type === 'photo' ? 'text-blue-700' : 'text-red-700' }}">
                    {{ $item->type === 'photo' ? 'Foto' : 'Video' }}
                </span>
                @if($item->is_featured)
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    ⭐ Featured
                </span>
                @endif
            </div>
        </div>

        <div class="p-4">
            <h3 class="font-bold text-gray-800 mb-2 line-clamp-2">{{ $item->title }}</h3>
            @if($item->description)
            <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $item->description }}</p>
            @endif

            <div class="flex items-center justify-between pt-3 border-t">
                <span class="text-xs text-gray-500">Order: {{ $item->order }}</span>
                <div class="flex gap-2">
                    <a href="{{ route('admin.gallery.edit', $item) }}" 
                       class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-4 text-center py-12 bg-white rounded-xl">
        <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <p class="text-lg font-medium text-gray-500">Belum ada media</p>
    </div>
    @endforelse
</div>

@if($galleries->hasPages())
<div class="mt-8">
    {{ $galleries->links() }}
</div>
@endif

@endsection

