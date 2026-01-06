<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BudayaController;


// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShowController as AdminShowController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// Pertunjukan & Booking
Route::controller(ShowController::class)->group(function () {
    Route::get('/pertunjukan', 'index')->name('shows.index');
    Route::get('/pertunjukan/{show}', 'show')->name('shows.show');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/pertunjukan/{show}/booking', 'create')->name('bookings.create');
    Route::post('/pertunjukan/{show}/booking', 'store')->name('bookings.store');
    Route::get('/booking/sukses/{bookingCode}', 'success')->name('bookings.success');
});

// Produk & Artikel
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimonials.store');

/*
|--------------------------------------------------------------------------
| Admin Routes (Auth Required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
 
    Route::get('/', [BudayaController::class, 'index']);
    // Dashboard Utama - Sekarang namanya jadi 'admin.dashboard'
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Management Resources - Namanya otomatis jadi admin.shows.index, dll
    Route::resource('shows', AdminShowController::class);
    Route::resource('gallery', AdminGalleryController::class);
    Route::resource('articles', AdminArticleController::class);

    // Products Management
    Route::post('products/{product}/delete-image', [AdminProductController::class, 'deleteImage'])->name('products.delete-image');
    Route::resource('products', AdminProductController::class);

    // Bookings Management
    Route::controller(AdminBookingController::class)->group(function () {
        Route::get('bookings', 'index')->name('bookings.index');
        Route::patch('bookings/{booking}/confirm', 'confirm')->name('bookings.confirm');
        Route::patch('bookings/{booking}/cancel', 'cancel')->name('bookings.cancel');
    });

    // Testimonials Management
    Route::controller(AdminTestimonialController::class)->group(function () {
        Route::get('testimonials', 'index')->name('testimonials.index');
        Route::get('testimonials/create', 'create')->name('testimonials.create');
        Route::post('testimonials', 'store')->name('testimonials.store');
        Route::patch('testimonials/{testimonial}/approve', 'approve')->name('testimonials.approve');
        Route::delete('testimonials/{testimonial}', 'destroy')->name('testimonials.destroy');
    });
});
require __DIR__ . '/auth.php';
