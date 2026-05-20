<?php

namespace App\Http\Controllers;

use App\Models\PrestasiMahasiswa;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $idMhs = $user->id_mhs;

        $totalPrestasi = PrestasiMahasiswa::where('id_mhs', $idMhs)->count();

        $menunggu = PrestasiMahasiswa::where('id_mhs', $idMhs)
            ->where('status_verifikasi', 'Menunggu')
            ->count();

        $terverifikasi = PrestasiMahasiswa::where('id_mhs', $idMhs)
            ->where('status_verifikasi', 'Terverifikasi')
            ->count();

        return view('mahasiswa-panel.dashboard', compact(
            'totalPrestasi',
            'menunggu',
            'terverifikasi'
        ));
    }
}