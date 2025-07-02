<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'frontend.pages.home')->name('home');
Route::view('/about', 'frontend.pages.about')->name('about');


Route::view('/login', 'admin.auth.login')->name('login');
Route::post('/login', LoginController::class)->name('login.attempt');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('news', NewsController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('slider', SliderController::class);

});
