<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkincareController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/skincare', function () {
    return view('pages.plp');
})->name('plp');

Route::get('/skincare/{i}', function () {
    return view('pages.pdp');
})->name('pdp');