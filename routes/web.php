<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('pages/about');
});
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth'); // only accessible if logged in

Route::get('/login', function () {
    return view('admin.login');
})->name('login'); // Laravel uses this route name for redirects