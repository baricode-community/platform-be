<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\System\General\SystemController::class)
    ->prefix('/system')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('system.index');
        Route::get('/users', 'users')->name('system.users');
        Route::get('/export', 'export')->name('system.export');
        Route::get('/import', 'import')->name('system.import');
});

// Sidebar demo route
Route::view('/sidebar-demo', 'pages.sidebar-demo')->name('sidebar-demo');
