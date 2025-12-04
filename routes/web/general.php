<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\General\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(\App\Http\Controllers\Web\General\DashboardController::class)
    ->prefix('/dashboard')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/analytics', 'analytics')->name('dashboard.analytics');
});