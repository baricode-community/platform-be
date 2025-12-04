<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\Fun\MemeController::class)
    ->prefix('/meme')
    ->group(function () {
        Route::get('/', 'index')->name('memes');
        Route::get('/create', 'create')
            ->middleware(['auth', 'verified'])
            ->name('memes.create');
        
        Route::get('/user', 'user_list')->name('memes.user_list');
        Route::get('/user/{user:username}', 'user')->name('memes.user');
    });

