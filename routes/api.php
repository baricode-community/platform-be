<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
    });

Route::controller(App\Http\Controllers\MeetController::class)
    ->prefix('meets')
    ->group(function () {
        Route::get('/', 'index')->name('meets.index');
        Route::get('/list', 'list')->name('meets.list');
    });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
