<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;

// Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('rumahsakit', RumahSakitController::class);
    Route::resource('pasien', PasienController::class);

    // 🔹 Tambahin route filter di sini
    Route::get('/pasien/filter/{rumahSakitId}', [PasienController::class, 'filter'])
        ->name('pasien.filter');
});

Route::get('/', function () {
    return view('home');
});