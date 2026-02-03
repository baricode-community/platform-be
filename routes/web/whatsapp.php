<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\General\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profile/{user:username?}', 'profile')->name('profile');
});