<?php

namespace App\Http\Controllers;

use App\Models\PrestasiMahasiswa;

class DosenDashboardController extends Controller
{
    public function index()
    {
        $totalPrestasi = PrestasiMahasiswa::count();
        $menunggu = PrestasiMahasiswa::where('status_dosen', 'Menunggu')->count();
        $perluRevisi = PrestasiMahasiswa::where('status_dosen', 'Perlu Revisi')->count();
        $disetujui = PrestasiMahasiswa::where('status_dosen', 'Disetujui')->count();
        $ditolak = PrestasiMahasiswa::where('status_dosen', 'Ditolak')->count();
        $latestPrestasis = PrestasiMahasiswa::with([
            'mahasiswa',
            'kategoriPrestasi',
            'tingkatPrestasi'
        ])
            ->orderBy('id_prestasi', 'desc')
            ->limit(10)
            ->get();

        return view('dosen-panel.dashboard', compact(
            'totalPrestasi',
            'menunggu',
            'perluRevisi',
            'disetujui',
            'ditolak',
            'latestPrestasis'
        ));
    }
}
