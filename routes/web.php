<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('pages/about');
});
Route::get('/admin', function () {
    return view('admin/index');
});
