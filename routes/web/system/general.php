<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Web\System\General\SystemController::class)
    ->prefix('/system')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('system.index');
        Route::get('/import', 'import')->name('system.import');
        Route::get('/export', 'export')->name('system.export');
});

Route::controller(\App\Http\Controllers\Web\System\General\UserManagementController::class)
    ->prefix('/system/user-management')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', 'index')->name('system.user_management.index');
        Route::get('/users', 'list')->name('system.user_management.users');
        Route::get('/export', 'export')->name('system.user_management.export');
        Route::get('/import', 'import')->name('system.user_management.import');
});

// Sidebar demo route
Route::view('/sidebar-demo', 'pages.sidebar-demo')->name('sidebar-demo');
