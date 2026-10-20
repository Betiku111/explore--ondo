<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StreetController as AdminStreetController;

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/streets/{street}', [StreetController::class, 'show'])->name('streets.show');

Route::get('/streets', [StreetController::class, 'index'])->name('streets.index');
Route::get('/streets/{street}', [StreetController::class, 'show'])->name('streets.show');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin (protected)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/streets', [AdminStreetController::class, 'index'])->name('streets.index');
    Route::get('/streets/create', [AdminStreetController::class, 'create'])->name('streets.create');
    Route::post('/streets', [AdminStreetController::class, 'store'])->name('streets.store');
    Route::put('/streets/{street}', [AdminStreetController::class, 'update'])->name('streets.update');
    Route::delete('/streets/{street}', [AdminStreetController::class, 'destroy'])->name('streets.destroy');
    Route::get('/streets/{street}/edit', [AdminStreetController::class, 'details'])->name('streets.details');


});
