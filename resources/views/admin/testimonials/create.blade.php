@extends('admin.layouts.app')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Testimoni Baru</h1>

    <form action="{{ route('admin.testimonials.store') }}" method="POST">
        @csrf

        {{-- Nama Pengunjung --}}
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-1">Nama Pengunjung</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-amber-500" 
                   required>
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Negara --}}
        <div class="mb-4">
            <label for="country" class="block text-gray-700 font-medium mb-1">Negara</label>
            <input type="text" id="country" name="country" value="{{ old('country') }}"
                   class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
            @error('country')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Rating --}}
        <div class="mb-4">
            <label for="rating" class="block text-gray-700 font-medium mb-1">Rating</label>
            <select id="rating" name="rating" 
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-amber-500" 
                    required>
                <option value="">Pilih rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                @endfor
            </select>
            @error('rating')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Pesan --}}
        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-medium mb-1">Pesan</label>
            <textarea id="message" name="message" rows="4"
                      class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-amber-500"
                      required>{{ old('message') }}</textarea>
            @error('message')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Optional: Checkbox Approve --}}
        <div class="mb-4 flex items-center gap-2">
            <input type="checkbox" id="is_approved" name="is_approved" value="1" {{ old('is_approved') ? 'checked' : '' }}>
            <label for="is_approved" class="text-gray-700 font-medium">Setujui Testimoni Sekarang</label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.testimonials.index') }}" 
               class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
