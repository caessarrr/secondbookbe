<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {
    // Authentication routes
    Route::get('login', 'App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'App\Http\Controllers\Admin\Auth\LoginController@login')->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Perbaikan ini

    // Dashboard route
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    // User management routes
    Route::resource('users', UserController::class);

    // Store management routes
    Route::prefix('stores')->name('stores.')->group(function () {
        Route::get('/', [StoreController::class, 'index'])->name('index');
        Route::get('create', [StoreController::class, 'create'])->name('create');
        Route::post('/', [StoreController::class, 'store'])->name('store');
        Route::get('{store}/edit', [StoreController::class, 'edit'])->name('edit');
        Route::put('{store}', [StoreController::class, 'update'])->name('update');
        Route::delete('{store}', [StoreController::class, 'destroy'])->name('destroy');
    });
});
