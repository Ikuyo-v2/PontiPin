<?php

use App\Http\Controllers\CafePageController;
use App\Http\Controllers\ExploreCafeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('Home.')->prefix('Home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/{id}', [HomeController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [HomeController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [HomeController::class, 'update'])->name('update');
    Route::delete('/{id}', [HomeController::class, 'destroy'])->name('destroy');
});
Route::name('ExploreCafe.')->prefix('ExploreCafe')->group(function () {
    Route::get('/', [ExploreCafeController::class, 'index'])->name('index');
    Route::get('/{id}', [ExploreCafeController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [ExploreCafeController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [ExploreCafeController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [ExploreCafeController::class, 'update'])->name('update');
    Route::delete('/{id}', [ExploreCafeController::class, 'destroy'])->name('destroy');
});
Route::name('CafePage.')->prefix('CafePage')->group(function () {
    Route::get('/', [CafePageController::class, 'index'])->name('index');
    Route::get('/{id}', [CafePageController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [CafePageController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [CafePageController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [CafePageController::class, 'update'])->name('update');
    Route::delete('/{id}', [CafePageController::class, 'destroy'])->name('destroy');
});
