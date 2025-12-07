<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\System\General\SystemController::class)
    ->prefix('/system')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('system.index');
        Route::get('/import', 'import')->name('system.import');
});

Route::controller(\App\Http\Controllers\Web\System\General\UserManagementController::class)
    ->prefix('/system/user-management')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('system.user_management');
        Route::get('/import', 'import')->name('system.user_management.import');
        Route::get('/export', 'export')->name('system.user_management.export');
});

// Sidebar demo route
Route::view('/sidebar-demo', 'pages.sidebar-demo')->name('sidebar-demo');
