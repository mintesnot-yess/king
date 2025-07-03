<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes (No Auth Needed)
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::view('/about', 'frontend.pages.about')->name('about');

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
});
