<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Note: HomeController is not yet implemented
// Route::controller(App\Http\Controllers\HomeController::class)
//     ->group(function () {
//         Route::get('/', 'index')->name('home');
//     });

// Note: UserController is not yet implemented
// Route::controller(App\Http\Controllers\UserController::class)
//     ->group(function () {
//         Route::get('/', 'index')->name('users.index');
//         Route::get('/list', 'list')->name('users.list');
//         Route::get('/{user:username}', 'show')->name('users.show');
//     });

// Note: MeetController is not yet implemented
// Route::controller(App\Http\Controllers\MeetController::class)
//     ->prefix('meets')
//     ->group(function () {
//         Route::get('/', 'index')->name('meets.index');
//         Route::get('/list', 'list')->name('meets.list');
//     });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
