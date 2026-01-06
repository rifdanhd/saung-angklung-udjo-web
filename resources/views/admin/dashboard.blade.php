{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600 mt-2">Selamat datang di Admin Panel Saung Angklung Udjo</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Shows -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm">Total Pertunjukan</p>
                <h3 class="text-3xl font-bold mt-2">{{ $stats['total_shows'] }}</h3>
                <p class="text-blue-100 text-xs mt-1">{{ $stats['upcoming_shows'] }} mendatang</p>
            </div>
            <div class="bg-white/20 rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Bookings -->
    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm">Total Booking</p>
                <h3 class="text-3xl font-bold mt-2">{{ $stats['total_bookings'] }}</h3>
                <p class="text-green-100 text-xs mt-1">{{ $stats['pending_bookings'] }} pending</p>
            </div>
            <div class="bg-white/20 rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Total Products -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm">Total Produk</p>
                <h3 class="text-3xl font-bold mt-2">{{ $stats['total_products'] }}</h3>
                <p class="text-purple-100 text-xs mt-1">Angklung & Souvenir</p>
            </div>
            <div class="bg-white/20 rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Pending Testimonials -->
    <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-amber-100 text-sm">Testimoni Pending</p>
                <h3 class="text-3xl font-bold mt-2">{{ $stats['pending_testimonials'] }}</h3>
                <p class="text-amber-100 text-xs mt-1">Perlu review</p>
            </div>
            <div class="bg-white/20 rounded-full p-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Revenue Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Pendapatan Bulan Ini</h3>
        <p class="text-4xl font-bold text-green-600">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}</p>
        <p class="text-gray-500 text-sm mt-2">{{ now()->format('F Y') }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Pendapatan Tahun Ini</h3>
        <p class="text-4xl font-bold text-blue-600">Rp {{ number_format($yearlyRevenue, 0, ',', '.') }}</p>
        <p class="text-gray-500 text-sm mt-2">{{ now()->format('Y') }}</p>
    </div>
</div>

<!-- Recent Bookings & Popular Shows -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Recent Bookings -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Booking Terbaru</h3>
            <a href="{{ route('admin.bookings.index') }}" class="text-amber-600 hover:text-amber-700 text-sm font-medium">
                Lihat Semua →
            </a>
        </div>

        <div class="space-y-4">
            @forelse($recentBookings as $booking)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-800">{{ $booking->name }}</h4>
                    <p class="text-sm text-gray-600">{{ $booking->show->title }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $booking->booking_code }}</p>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 rounded-full text-xs font-medium
                        {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                    <p class="text-sm font-semibold text-gray-700 mt-1">
                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-8">Belum ada booking</p>
            @endforelse
        </div>
    </div>

    <!-- Popular Shows -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Pertunjukan Populer</h3>
            <a href="{{ route('admin.shows.index') }}" class="text-amber-600 hover:text-amber-700 text-sm font-medium">
                Lihat Semua →
            </a>
        </div>

        <div class="space-y-4">
            @forelse($popularShows as $show)
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-800">{{ $show->title }}</h4>
                    <p class="text-sm text-gray-600">{{ $show->date->format('d M Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-lg font-bold text-amber-600">{{ $show->bookings_count }}</p>
                    <p class="text-xs text-gray-500">Bookings</p>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-8">Belum ada data</p>
            @endforelse
        </div>
    </div>
</div>

@endsection