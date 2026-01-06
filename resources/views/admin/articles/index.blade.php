@extends('admin.layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Artikel</h1>
        <a href="{{ route('admin.articles.create') }}"
            class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-lg font-semibold transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Artikel
        </a>
    </div>

    @if (session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] bg-white rounded-xl shadow-lg divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">#</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Foto</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Judul</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Kategori</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Penulis</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Tanggal</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Status</th>
                    <th class="px-4 py-3 text-left text-gray-700 text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($articles as $article)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-sm text-gray-600">
                            {{ $loop->iteration + ($articles->currentPage() - 1) * $articles->perPage() }}</td>

                        {{-- Thumbnail --}}
                        <td class="px-4 py-3">
                            @if ($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}"
                                    class="w-20 h-12 object-cover rounded-lg border border-gray-200">
                            @else
                                <div
                                    class="w-20 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs">
                                    No Image</div>
                            @endif
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-800">{{ $article->title }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $article->category }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $article->user->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $article->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            @if ($article->is_published)
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Published
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-800">
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('admin.articles.edit', $article) }}"
                                class="flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 11l3 3L21 5l-3-3-12 12v3h3z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">Belum ada artikel</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $articles->links() }}
    </div>
@endsection
