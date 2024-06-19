<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('book/{id}', 'book')->name('book');

Route::view('/store', 'store')->name('store');

Route::view('/cart', 'cart')->middleware(['auth'])->name('cart');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';
