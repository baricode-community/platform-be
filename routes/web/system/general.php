<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\System\General\SystemController::class)
    ->prefix('/system')
    ->group(function () {
        Route::get('/', 'index')->name('system.index');
        Route::get('/export', 'export')->name('system.export');
        Route::get('/import', 'import')->name('system.import');
});
