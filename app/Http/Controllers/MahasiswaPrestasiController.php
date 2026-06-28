<?php

namespace App\Http\Controllers;

use App\Models\KategoriPrestasi;
use App\Models\PrestasiMahasiswa;
use App\Models\TingkatPrestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MahasiswaPrestasiController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $idMhs = $user->id_mhs;

        $prestasiMahasiswas = PrestasiMahasiswa::with([
            'mahasiswa',
            'kategoriPrestasi',
            'tingkatPrestasi',
        ])
            ->where('id_mhs', $idMhs)
            ->orderBy('id_prestasi', 'desc')
            ->get();

        return view('mahasiswa-panel.prestasi.index', compact('prestasiMahasiswas'));
    }

    public function create()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $mahasiswa = $user->mahasiswa;

        $kategoriPrestasis = KategoriPrestasi::whereIn('nama_kategori', [
            'Akademik',
            'Non-Akademik',
        ])
            ->orderBy('nama_kategori', 'asc')
            ->get();

        $tingkatPrestasis = TingkatPrestasi::orderBy('nama_tingkat', 'asc')->get();

        return view('mahasiswa-panel.prestasi.create', compact(
            'mahasiswa',
            'kategoriPrestasis',
            'tingkatPrestasis'
        ));
    }

    public function store(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'id_kategori' => [
                'required',
                Rule::exists('kategori_prestasis', 'id_kategori')->where(function ($query) {
                    return $query->whereIn('nama_kategori', [
                        'Akademik',
                        'Non-Akademik',
                    ]);
                }),
            ],
            'id_tingkat' => 'required|exists:tingkat_prestasis,id_tingkat',
            'nama_kegiatan' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'juara' => 'required|string|max:100',
            'file_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('file_sertifikat')) {
            $filePath = $request->file('file_sertifikat')->store('sertifikat', 'public');
        }

        PrestasiMahasiswa::create([
            'id_mhs' => $user->id_mhs,
            'id_kategori' => $request->id_kategori,
            'id_tingkat' => $request->id_tingkat,
            'nama_kegiatan' => $request->nama_kegiatan,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'juara' => $request->juara,
            'file_sertifikat' => $filePath,
            'status_verifikasi' => 'Menunggu',
        ]);

        return redirect()
            ->route('mahasiswa.prestasi.index')
            ->with('success', 'Prestasi berhasil diajukan dan menunggu verifikasi admin.');
    }
}