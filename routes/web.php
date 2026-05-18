<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HakAksesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('hak-akses', HakAksesController::class)->only(['index']);
});