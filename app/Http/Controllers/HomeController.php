<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Gallery;
use App\Models\Article;
use App\Models\Testimonial;
use App\Models\Product;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location; // Pastikan baris ini ada

class HomeController extends Controller
{
    public function index(Request $request) // Tambahkan Request $request di sini
    {
        // Logika Pelacak Lokasi
        $ip = '8.8.8.8';
        $location = Location::get($ip);

        $upcomingShows = Show::where('is_active', true)
            ->orderBy('id', 'asc')
            ->take(3)
            ->get();

        $featuredGallery = Gallery::featured()->ordered()->take(6)->get();
        $latestArticles = Article::published()->latest('published_at')->take(6)->get();
        $testimonials = Testimonial::approved()->recent()->get();
        $featuredProducts = Product::featured()->available()->take(4)->get();

        // Tambahkan 'location' ke dalam compact
        return view('home', compact(
            'upcomingShows',
            'featuredGallery',
            'latestArticles',
            'testimonials',
            'featuredProducts',
            'location' 
        ));
    }

    public function about()
    {
        return view('about');
    }
    
    public function contact()
    {
        return view('contact');
    }
}