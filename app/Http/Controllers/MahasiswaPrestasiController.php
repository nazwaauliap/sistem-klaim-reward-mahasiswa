<?php

namespace App\Http\Controllers;

use App\Models\KategoriPrestasi;
use App\Models\TingkatPrestasi;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;

class MahasiswaPrestasiController extends Controller
{
    public function index()
    {
        $idMhs = auth()->user()->id_mhs;

        $prestasiMahasiswas = PrestasiMahasiswa::with([
            'mahasiswa',
            'kategoriPrestasi',
            'tingkatPrestasi'
        ])
            ->where('id_mhs', $idMhs)
            ->orderBy('id_prestasi', 'desc')
            ->get();

        return view('mahasiswa-panel.prestasi.index', compact('prestasiMahasiswas'));
    }

    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $kategoriPrestasis = KategoriPrestasi::orderBy('nama_kategori', 'asc')->get();
        $tingkatPrestasis = TingkatPrestasi::orderBy('nama_tingkat', 'asc')->get();

        return view('mahasiswa-panel.prestasi.create', compact(
            'mahasiswa',
            'kategoriPrestasis',
            'tingkatPrestasis'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'id_tingkat' => 'required',
            'nama_kegiatan' => 'required',
            'penyelenggara' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'juara' => 'required',
            'file_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('file_sertifikat')) {
            $filePath = $request->file('file_sertifikat')->store('sertifikat', 'public');
        }

        PrestasiMahasiswa::create([
            'id_mhs' => auth()->user()->id_mhs,
            'id_kategori' => $request->id_kategori,
            'id_tingkat' => $request->id_tingkat,
            'nama_kegiatan' => $request->nama_kegiatan,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'juara' => $request->juara,
            'file_sertifikat' => $filePath,
            'status_verifikasi' => 'Menunggu',
        ]);

        return redirect()->route('mahasiswa.prestasi.index')
            ->with('success', 'Prestasi berhasil diajukan dan menunggu verifikasi admin.');
    }
}