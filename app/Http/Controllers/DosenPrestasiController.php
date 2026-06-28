<?php

namespace App\Http\Controllers;

use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;

class DosenPrestasiController extends Controller
{
    public function index()
    {
        $prestasiMahasiswas = PrestasiMahasiswa::with([
            'mahasiswa',
            'kategoriPrestasi',
            'tingkatPrestasi'
        ])
            ->orderBy('id_prestasi', 'desc')
            ->get();

        return view('dosen-panel.prestasi-mahasiswa.index', compact('prestasiMahasiswas'));
    }

    public function show(PrestasiMahasiswa $prestasiMahasiswa)
    {
        $prestasiMahasiswa->load([
            'mahasiswa',
            'kategoriPrestasi',
            'tingkatPrestasi'
        ]);

        return view('dosen-panel.prestasi-mahasiswa.show', compact('prestasiMahasiswa'));
    }

    public function update(Request $request, PrestasiMahasiswa $prestasiMahasiswa)
    {
        $request->validate([
            'status_dosen' => 'required|in:Menunggu,Perlu Revisi,Disetujui,Ditolak',
            'catatan_dosen' => 'nullable|string',
        ]);

        $prestasiMahasiswa->update([
            'status_dosen' => $request->status_dosen,
            'catatan_dosen' => $request->catatan_dosen,
        ]);

        return redirect()->route('dosen.prestasi-mahasiswa.show', $prestasiMahasiswa)
            ->with('success', 'Status dan catatan dosen berhasil diperbarui.');
    }
}
