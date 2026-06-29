<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TempatKulinerController;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/tempat-kuliner/pdf', [TempatKulinerController::class, 'exportPdf'])->name('tempat-kuliner.pdf');
        Route::resource('tempat-kuliner', TempatKulinerController::class);
    });
});
