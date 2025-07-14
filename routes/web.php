<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

// Public Routes (No Auth Needed)
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/product', [FrontendController::class, 'product'])->name('product');
Route::get('/product/{id}', [FrontendController::class, 'productDetails'])->name('product.detail');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/service/{id}', [FrontendController::class, 'serviceDetails'])->name('service.detail');
Route::get('/gallery-images', [FrontendController::class, 'images'])->name('images');
Route::get('/gallery-videos', [FrontendController::class, 'videos'])->name('videos');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');



// Auth Routes (Login/Logout)
Route::middleware('guest')->group(function () {
    Route::view('/login', 'admin.auth.login')->name('login');
    Route::post('/login', LoginController::class)->name('login.attempt');
});

// Admin Routes (Require Auth)
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin');

    // Logout (POST-only for security)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Profile Management (All authenticated users)
    Route::resource('profile', ProfileController::class);

    // Super Admin-Only Routes (Require 'super_admin' role)
    Route::middleware('can:super_admin')->group(function () {
        Route::resource('users', UserController::class);
    });    // Super Admin-Only Routes (Require 'super_admin' role)

    // Regular Admin Routes (No special role needed)
    Route::resource('news', NewsController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('stuff', StuffController::class);
    Route::resource('gallery', GalleryController::class);
});
