<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\Pasien;
use App\Http\Controllers\Pemeriksaan;

// Route::get('/', function () {
//     return view('auth/login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified']) -> group(function (){
    Route::controller(home::class)->group(function () {
        // Route::get('/', 'index')->name('login');
        Route::get('/', 'index')->name('dashboard');
    });

    Route::controller(Pasien::class)->group(function () {
        Route::get('/pasien', 'index')->name('pasien');
        Route::get('/daftar/pasien', 'daftarpasien')->name('daftar.pasien');
    });

    Route::controller(Pemeriksaan::class)->group(function () {
        Route::get('/rekammedis', 'index')->name('rekam.medis');
        Route::get('/daftar/rekammedis', 'daftarrekammedis')->name('daftar.rekammedis');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
