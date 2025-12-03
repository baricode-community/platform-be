<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\Fun\MemeController::class)
    ->prefix('/meme')
    ->group(function () {
        Route::get('/', 'index')->name('meme');
    });

Route::get('/profile/{username}', function ($username) {
    // TODO: Implement user profile page
    return redirect('/meme');
})->name('profile');
