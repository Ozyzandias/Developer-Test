<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Images;

Route::any('/', [Auth::class, 'index'])->name('home');

Route::get('/sign-up', function () {
    return view('signup');
})->name('signup');

Route::post('/sign-up/validation', [Auth::class, 'signup'])->name('signupmethod');

Route::get('/sign-in', function () {
    return view('signin');
})->name('login');

Route::post('/sign-in/validation', [Auth::class, 'login'])->name('signmethod');

Route::get('/logout', [Auth::class, 'logout'])->name('logout');

Route::any('/moderation', [Auth::class, 'moderation'])->name('moderation');

Route::any('/moderation/approve/{id_image?}', [Auth::class, 'approve'])->name('approve');

Route::any('/add/favorite/{id_image?}', [Auth::class, 'addFav'])->name('addFav');

Route::any('/favorites/remove/{id_image?}', [Auth::class, 'removeFav'])->name('removeFav');

Route::get('/upload', function () {
    return view('upload');
})->name('upload');

Route::post('/upload/validation', [Images::class, 'upload'])->name('uploadmethod');

Route::any('/favorites', [Auth::class, 'favorites'])->name('favorites');
