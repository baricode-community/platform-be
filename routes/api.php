<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Timeline Routes
Route::controller(App\Http\Controllers\Api\General\TimelineController::class)
    ->prefix('timelines')
    ->group(function () {
        Route::get('/', 'index')->name('timelines.index');
        Route::get('/{timeline}', 'show')->name('timelines.show');
    });
