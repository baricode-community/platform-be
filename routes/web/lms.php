<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\LMS\LMSController;

Route::controller(LMSController::class)
    ->middleware(['auth'])
    ->prefix('/lms')
    ->group(function () {
        Route::get('/', 'index')->name('lms.index');
        Route::get('/course/{course:slug}', 'course')->name('lms.course');
        Route::get('/lesson/{lesson}', 'lesson')->name('lms.lesson');
});
