<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CafePageController;
use App\Http\Controllers\ExploreCafeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin-page', [AdminPageController::class, 'index'])->name('admin-page.index');
Route::delete('/admin/users/{id}', [AdminPageController::class, 'destroyUser'])->name('admin.users.destroy')->whereNumber('id');

Route::name('home.')->prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/{id}', [HomeController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [HomeController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [HomeController::class, 'update'])->name('update');
    Route::delete('/{id}', [HomeController::class, 'destroy'])->name('destroy');
});
Route::name('explore-cafe.')->prefix('explore-cafe')->group(function () {
    Route::get('/', [ExploreCafeController::class, 'index'])->name('index');
    Route::get('/{id}', [ExploreCafeController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [ExploreCafeController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [ExploreCafeController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [ExploreCafeController::class, 'update'])->name('update');
    Route::delete('/{id}', [ExploreCafeController::class, 'destroy'])->name('destroy');
});
Route::name('cafe-page.')->prefix('cafe-page')->group(function () {
    Route::get('/', [CafePageController::class, 'index'])->name('index');
    Route::post('/', [CafePageController::class, 'store'])->name('store');
    Route::post('/{cafe}/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');
    Route::get('/{id}', [CafePageController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [CafePageController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [CafePageController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [CafePageController::class, 'update'])->name('update');
    Route::delete('/{id}', [CafePageController::class, 'destroy'])->name('destroy');
});
