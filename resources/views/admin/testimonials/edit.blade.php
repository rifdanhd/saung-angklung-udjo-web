{{-- resources/views/admin/testimonials/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Edit Testimoni')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.testimonials.index') }}" class="text-amber-600 hover:text-amber-700 flex items-center gap-2 mb-2 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Daftar
    </a>
    <h1 class="text-3xl font-bold text-gray-800">Edit Testimoni</h1>
    <p class="text-gray-600">Perbarui informasi feedback dari {{ $testimonial->name }}</p>
</div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-2xl">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Pengunjung</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $testimonial->name) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition @error('name') border-red-500 @enderror" 
                       required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="country" class="block text-sm font-semibold text-gray-700 mb-2">Asal Negara / Lokasi</label>
                <input type="text" name="country" id="country" 
                       value="{{ old('country', $testimonial->country) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition @error('country') border-red-500 @enderror" 
                       placeholder="Contoh: Indonesia atau Google Maps User"
                       required>
                @error('country')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Rating</label>
                <div class="flex gap-4">
                    @for($i = 1; $i <= 5; $i++)
                    <label class="flex items-center gap-1 cursor-pointer group">
                        <input type="radio" name="rating" value="{{ $i }}" 
                               {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}
                               class="w-4 h-4 text-amber-600 focus:ring-amber-500 border-gray-300">
                        <span class="text-gray-700 group-hover:text-amber-600">{{ $i }} ⭐</span>
                    </label>
                    @endfor
                </div>
                @error('rating')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Isi Testimoni</label>
                <textarea name="message" id="message" rows="5" 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition @error('message') border-red-500 @enderror" 
                          required>{{ old('message', $testimonial->message) }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">
            <button type="submit" 
                    class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-lg font-bold transition shadow-md">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.testimonials.index') }}" 
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-bold transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection