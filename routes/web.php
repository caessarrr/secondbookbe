<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StoreController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login', 'App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login.submit');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('users', UserController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {
    // Routes for managing stores
    Route::get('stores', [StoreController::class, 'index'])->name('stores.index');
    Route::get('stores/create', [StoreController::class, 'create'])->name('stores.create');
    Route::post('stores', [StoreController::class, 'store'])->name('stores.store');
    Route::get('stores/{store}/edit', [StoreController::class, 'edit'])->name('stores.edit');
    Route::put('stores/{store}', [StoreController::class, 'update'])->name('stores.update');
    Route::delete('stores/{store}', [StoreController::class, 'destroy'])->name('stores.destroy');
});

