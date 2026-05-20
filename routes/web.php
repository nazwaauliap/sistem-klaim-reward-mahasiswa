<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\KategoriPrestasiController;
use App\Http\Controllers\TingkatPrestasiController;
use App\Http\Controllers\PeriodeKlaimController;
use App\Http\Controllers\JenisRewardController;
use App\Http\Controllers\PrestasiMahasiswaController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\MahasiswaPrestasiController;
use App\Http\Controllers\MahasiswaKlaimRewardController;
use App\Http\Controllers\AdminKlaimRewardController;
use App\Http\Controllers\PencairanRewardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:Admin'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('hak-akses', HakAksesController::class)->only(['index']);
        Route::resource('kategori-prestasi', KategoriPrestasiController::class);
        Route::resource('tingkat-prestasi', TingkatPrestasiController::class);
        Route::resource('periode-klaim', PeriodeKlaimController::class);
        Route::resource('jenis-reward', JenisRewardController::class);
        Route::resource('prestasi-mahasiswa', PrestasiMahasiswaController::class);
        Route::resource('klaim-reward', AdminKlaimRewardController::class)->only(['index', 'edit', 'update']);
        Route::resource('pencairan-reward', PencairanRewardController::class);

        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });

Route::prefix('mahasiswa')
    ->name('mahasiswa.')
    ->middleware(['auth', 'role:Mahasiswa'])
    ->group(function () {
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');

        Route::get('/prestasi', [MahasiswaPrestasiController::class, 'index'])->name('prestasi.index');
        Route::get('/prestasi/create', [MahasiswaPrestasiController::class, 'create'])->name('prestasi.create');
        Route::post('/prestasi', [MahasiswaPrestasiController::class, 'store'])->name('prestasi.store');

        Route::get('/klaim-reward', [MahasiswaKlaimRewardController::class, 'index'])->name('klaim-reward.index');
        Route::get('/klaim-reward/create', [MahasiswaKlaimRewardController::class, 'create'])->name('klaim-reward.create');
        Route::post('/klaim-reward', [MahasiswaKlaimRewardController::class, 'store'])->name('klaim-reward.store');
    });

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout-home', [AuthController::class, 'logoutHome'])->name('logout.home');