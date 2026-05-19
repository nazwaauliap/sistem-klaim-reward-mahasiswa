<?php

namespace App\Http\Controllers;

use App\Models\PrestasiMahasiswa;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $totalPrestasi = PrestasiMahasiswa::count();
        $menunggu = PrestasiMahasiswa::where('status_verifikasi', 'Menunggu')->count();
        $terverifikasi = PrestasiMahasiswa::where('status_verifikasi', 'Terverifikasi')->count();

        return view('mahasiswa-panel.dashboard', compact(
            'totalPrestasi',
            'menunggu',
            'terverifikasi'
        ));
    }
}