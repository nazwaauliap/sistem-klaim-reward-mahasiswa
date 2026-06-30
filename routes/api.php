<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\PrestasiController;
use App\Http\Controllers\Api\MasterDataController;
use App\Http\Controllers\Api\KlaimRewardController;

Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/prestasi', [PrestasiController::class, 'index']);
        Route::get('/prestasi/{id}', [PrestasiController::class, 'show']);
        Route::post('/prestasi', [PrestasiController::class, 'store']);

        Route::get('/kategori-prestasi', [MasterDataController::class, 'kategoriPrestasi']);
        Route::get('/tingkat-prestasi', [MasterDataController::class, 'tingkatPrestasi']);
        Route::get('/jenis-reward', [MasterDataController::class, 'jenisReward']);

        Route::get('/klaim-reward', [KlaimRewardController::class, 'index']);
        Route::post('/klaim-reward', [KlaimRewardController::class, 'store']);
    });

});