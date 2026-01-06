{{-- Partial form untuk create & edit artikel --}}
<div class="grid grid-cols-1 gap-6">

    {{-- Title --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Judul <span class="text-red-500">*</span>
        </label>
        <input type="text" 
               name="title" 
               value="{{ old('title', $article->title ?? '') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('title') border-red-500 @enderror"
               required>
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Excerpt --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Excerpt <span class="text-red-500">*</span>
        </label>
        <textarea name="excerpt" 
                  rows="3"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('excerpt') border-red-500 @enderror"
                  required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Content --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Konten <span class="text-red-500">*</span>
        </label>
        <textarea name="content" 
                  rows="8"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('content') border-red-500 @enderror"
                  required>{{ old('content', $article->content ?? '') }}</textarea>
        @error('content')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Category --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Kategori <span class="text-red-500">*</span>
        </label>
        <input type="text" 
               name="category" 
               value="{{ old('category', $article->category ?? '') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('category') border-red-500 @enderror"
               required>
        @error('category')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Featured Image --}}
    @if(!empty($article?->featured_image))
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $article->featured_image) }}" 
                 alt="{{ $article->title }}" 
                 class="w-48 h-32 object-cover rounded-lg mb-2">
        </div>
    @endif

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Gambar Baru (Opsional)
        </label>
        <input type="file" 
               name="featured_image" 
               accept="image/*"
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent @error('featured_image') border-red-500 @enderror">
        @error('featured_image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Publish --}}
    <div>
        <label class="flex items-center gap-3 cursor-pointer">
            <input type="checkbox" 
                   name="is_published" 
                   value="1"
                   {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}
                   class="w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-2 focus:ring-amber-500">
            <span class="text-sm font-medium text-gray-700">Publish artikel ini</span>
        </label>
    </div>

</div>
