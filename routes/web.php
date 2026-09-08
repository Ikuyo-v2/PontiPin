<?php

use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::name('Home.')->prefix('Home')->group(function () {
    Route::get('/', [CafeController::class, 'index'])->name('index');
    Route::get('/{id}', [CafeController::class, 'show'])->name('show')->whereNumber('id');
    Route::get('/create', [CafeController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [CafeController::class, 'edit'])->name('edit')->whereNumber('id');
    Route::put('/{id}', [CafeController::class, 'update'])->name('update');
    Route::delete('/{id}', [CafeController::class, 'destroy'])->name('destroy');
});
