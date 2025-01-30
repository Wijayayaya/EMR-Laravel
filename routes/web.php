<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\Pemeriksaan;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;

// Route::get('/', function () {
//     return view('auth/login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified']) -> group(function (){
//     Route::controller(home::class)->group(function () {
//         // Route::get('/', 'index')->name('login');
//         Route::get('/', 'index')->name('dashboard');
//     });

//     Route::controller(PasienController::class)->group(function () {
//         Route::get('/pasien', 'index')->name('pasien');
//         Route::get('/daftar/pasien', 'daftarpasien')->name('daftar.pasien');
//         // Route::post('/pasien/baru', 'pasienbaru')->name('pasien.baru');
//     });

//     Route::controller(Pemeriksaan::class)->group(function () {
//         Route::get('/rekammedis', 'index')->name('rekam.medis');
//         Route::get('/daftar/rekammedis', 'daftarrekammedis')->name('daftar.rekammedis');
//     });
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(home::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });


    Route::controller(PasienController::class)->group(function () {
        Route::get('/pasien', 'create')->name('pasien');
        Route::get('/daftarpasien', 'index')->name('daftar.pasien');
        Route::get('/editpasien/{pasien}', 'edit')->name('edit.pasien');
        Route::get('/pasien/{pasien}', 'show')->name('pasien.show');
        
        // CRUD Operations
        Route::post('/pasien', 'store')->name('pasien.store');
        Route::put('/pasien/{pasien}', 'update')->name('pasien.update');
        Route::delete('/pasien/{pasien}', 'destroy')->name('pasien.destroy');
    });

    Route::controller(PemeriksaanController::class)->group(function () {
        Route::get('/rekammedis', 'create')->name('rekam.medis');
        Route::get('/daftarrekammedis', 'index')->name('daftar.rekammedis');
        Route::get('/editrekammedis/{pemeriksaan}', 'edit')->name('edit.rekammedis');
         Route::get('/rekammedis/{pemeriksaan}', 'show')->name('rekammedis.show');
        
        // CRUD Operations
        Route::post('/rekammedis', 'store')->name('rekammedis.store');
        Route::put('/rekammedis/{pemeriksaan}', 'updater')->name('rekammedis.update');
        Route::delete('/rekammedis/{pemeriksaan}', 'destroy')->name('rekammedis.destroy');
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
