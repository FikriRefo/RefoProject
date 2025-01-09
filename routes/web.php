<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterKaryawanController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\PerhitunganGajiController;
use App\Http\Controllers\RekapPerhitunganGajiController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Group routes for Master User with role check
Route::prefix('master-user')->name('master.user.')->middleware('auth')->group(function () {
    Route::get('/', [MasterUserController::class, 'index'])->name('index');
    Route::get('create', [MasterUserController::class, 'create'])->name('create');
    Route::post('store', [MasterUserController::class, 'store'])->name('store');
    Route::get('edit/{id}', [MasterUserController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [MasterUserController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [MasterUserController::class, 'destroy'])->name('destroy');
});

// Master Karyawan Routes
Route::resource('master-karyawan', 'MasterKaryawanController');
Route::post('master-karyawan/import', 'MasterKaryawanController@import')->name('master-karyawan.import');
Route::prefix('master-karyawan')->name('master-karyawan.')->group(function () {
    Route::get('/', [MasterKaryawanController::class, 'index'])->name('index');
    Route::get('/create', [MasterKaryawanController::class, 'create'])->name('create');
    Route::post('/', [MasterKaryawanController::class, 'store'])->name('store');
    Route::get('/{karyawan}/edit', [MasterKaryawanController::class, 'edit'])->name('edit');
    Route::put('/{karyawan}', [MasterKaryawanController::class, 'update'])->name('update');
    Route::delete('/{karyawan}', [MasterKaryawanController::class, 'destroy'])->name('destroy');
    Route::post('/import', [MasterKaryawanController::class, 'import'])->name('import');
});

// Group routes for Perhitungan Gaji (accessible by all users)
Route::prefix('perhitungan-gaji')->middleware('auth')->group(function() {
    Route::get('/', [PerhitunganGajiController::class, 'index'])->name('perhitungan.gaji.index');
});

// Group routes for Rekap Perhitungan Gaji (accessible by all users)
Route::prefix('rekap-perhitungan-gaji')->middleware('auth')->group(function() {
    Route::get('/', [RekapPerhitunganGajiController::class, 'index'])->name('rekap.perhitungan.gaji.index');
});
