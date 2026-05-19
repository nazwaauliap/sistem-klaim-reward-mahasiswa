<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\KategoriPrestasiController;
use App\Http\Controllers\TingkatPrestasiController;
use App\Http\Controllers\PeriodeKlaimController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('hak-akses', HakAksesController::class)->only(['index']);
    Route::resource('kategori-prestasi', KategoriPrestasiController::class);
    Route::resource('tingkat-prestasi', TingkatPrestasiController::class);
    Route::resource('periode-klaim', PeriodeKlaimController::class);
});