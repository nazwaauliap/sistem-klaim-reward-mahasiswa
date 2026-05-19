<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\KategoriPrestasi;
use App\Models\TingkatPrestasi;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;

class PrestasiMahasiswaController extends Controller
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

        return view('prestasi-mahasiswa.index', compact('prestasiMahasiswas'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::orderBy('nama', 'asc')->get();
        $kategoriPrestasis = KategoriPrestasi::orderBy('nama_kategori', 'asc')->get();
        $tingkatPrestasis = TingkatPrestasi::orderBy('nama_tingkat', 'asc')->get();

        return view('prestasi-mahasiswa.create', compact(
            'mahasiswas',
            'kategoriPrestasis',
            'tingkatPrestasis'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mhs' => 'required',
            'id_kategori' => 'required',
            'id_tingkat' => 'required',
            'nama_kegiatan' => 'required',
            'penyelenggara' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'juara' => 'required',
            'file_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status_verifikasi' => 'nullable|in:Menunggu,Terverifikasi,Ditolak,Revisi',
        ]);

        $filePath = null;

        if ($request->hasFile('file_sertifikat')) {
            $filePath = $request->file('file_sertifikat')->store('sertifikat', 'public');
        }

        PrestasiMahasiswa::create([
            'id_mhs' => $request->id_mhs,
            'id_kategori' => $request->id_kategori,
            'id_tingkat' => $request->id_tingkat,
            'nama_kegiatan' => $request->nama_kegiatan,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'juara' => $request->juara,
            'file_sertifikat' => $filePath,
            'status_verifikasi' => $request->status_verifikasi ?? 'Menunggu',
        ]);

        return redirect()->route('admin.prestasi-mahasiswa.index')
            ->with('success', 'Data prestasi mahasiswa berhasil ditambahkan.');
    }

    public function edit(PrestasiMahasiswa $prestasiMahasiswa)
    {
        return view('prestasi-mahasiswa.edit', compact('prestasiMahasiswa'));
    }

    public function update(Request $request, PrestasiMahasiswa $prestasiMahasiswa)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:Menunggu,Terverifikasi,Ditolak,Revisi',
        ]);

        $prestasiMahasiswa->update([
            'status_verifikasi' => $request->status_verifikasi,
        ]);

        return redirect()->route('admin.prestasi-mahasiswa.index')
            ->with('success', 'Status verifikasi prestasi berhasil diperbarui.');
    }

    public function destroy(PrestasiMahasiswa $prestasiMahasiswa)
    {
        $prestasiMahasiswa->delete();

        return redirect()->route('admin.prestasi-mahasiswa.index')
            ->with('success', 'Data prestasi mahasiswa berhasil dihapus.');
    }
}