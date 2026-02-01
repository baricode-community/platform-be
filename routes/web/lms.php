<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\LMS\LMSController;

Route::controller(LMSController::class)
    ->prefix('/lms')
    ->group(function () {
        Route::get('/', 'index')->name('lms.index');
});
