<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Article;
use App\Models\Testimonial;
use Illuminate\Support\Carbon; // Import Carbon untuk manipulasi tanggal

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Grouping Stats (biar ringkas)
        $stats = [
            'total_shows'          => Show::count(),
            'upcoming_shows'       => Show::where('date', '>=', now())->count(),
            'total_bookings'       => Booking::count(),
            'pending_bookings'     => Booking::where('status', 'pending')->count(),
            'confirmed_bookings'   => Booking::where('status', 'confirmed')->count(),
            'total_products'       => Product::count(),
            'total_articles'       => Article::count(),
            'pending_testimonials' => Testimonial::where('is_approved', false)->count(),
        ];

        // 2. Revenue (Tambahkan default 0 supaya tidak null)
        $monthlyRevenue = Booking::where('status', 'confirmed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year) // Tambahkan tahun supaya tidak campur dengan tahun lalu
            ->sum('total_price') ?? 0;

        $yearlyRevenue = Booking::where('status', 'confirmed')
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_price') ?? 0;

        // 3. Recent Bookings (Ambil yang penting saja)
        $recentBookings = Booking::with('show')
            ->latest()
            ->take(10)
            ->get();

        // 4. Popular Shows (Top 5 Pertunjukan paling laku)
        $popularShows = Show::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'monthlyRevenue',
            'yearlyRevenue',
            'recentBookings',
            'popularShows'
        ));
    }
}
