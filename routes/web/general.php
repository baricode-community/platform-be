<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\General\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profile/{user:username?}', 'profile')->name('profile');
});

Route::controller(\App\Http\Controllers\Web\General\TimelineController::class)
    ->prefix('/timelines')
    ->group(function () {
        Route::get('/', 'index')->name('timelines.index');
        Route::get('/{timeline}', 'show')->name('timelines.show');
});


Route::controller(\App\Http\Controllers\Web\General\DashboardController::class)
    ->prefix('/dashboard')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/settings', 'settings')->name('dashboard.settings');
        Route::get('/analytics', 'analytics')->name('dashboard.analytics');
        Route::get('/fun', 'fun')->name('dashboard.fun');
        Route::get('/memes', 'memes')->name('dashboard.memes');
});

Route::controller(\App\Http\Controllers\DailyCommitTrackerController::class)
    ->prefix('/daily-commit-tracker')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('daily-commit-tracker.index');
        Route::get('/show/{date?}', 'show')->name('daily-commit-tracker.show');
        Route::get('/history', 'history')->name('daily-commit-tracker.history');
    });