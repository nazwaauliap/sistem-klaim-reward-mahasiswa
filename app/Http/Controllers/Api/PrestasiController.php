<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $prestasi = PrestasiMahasiswa::with([
            'kategoriPrestasi',
            'tingkatPrestasi',
        ])
        ->where('id_mhs', $request->user()->id_mhs)
        ->orderByDesc('id_prestasi')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar prestasi berhasil diambil.',
            'data' => $prestasi->map(function ($item) {

                return [
                    'id' => $item->id_prestasi,
                    'nama_kegiatan' => $item->nama_kegiatan,
                    'kategori' => $item->kategoriPrestasi->nama_kategori,
                    'tingkat' => $item->tingkatPrestasi->nama_tingkat,
                    'penyelenggara' => $item->penyelenggara,
                    'tanggal' => $item->tanggal_kegiatan,
                    'juara' => $item->juara,
                    'status' => $item->status_verifikasi,
                    'sertifikat' => $item->file_sertifikat
                        ? asset('storage/'.$item->file_sertifikat)
                        : null,
                ];
            })
        ]);
    }

    public function show(Request $request, $id)
    {
    $prestasi = PrestasiMahasiswa::with([
        'kategoriPrestasi',
        'tingkatPrestasi',
        'mahasiswa',
    ])
    ->where('id_prestasi', $id)
    ->where('id_mhs', $request->user()->id_mhs)
    ->first();

    if (!$prestasi) {
        return response()->json([
            'success' => false,
            'message' => 'Prestasi tidak ditemukan.'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'Detail prestasi berhasil diambil.',
        'data' => [
            'id_prestasi' => $prestasi->id_prestasi,
            'mahasiswa' => $prestasi->mahasiswa->nama,
            'nim' => $prestasi->mahasiswa->nim,
            'nama_kegiatan' => $prestasi->nama_kegiatan,
            'kategori' => $prestasi->kategoriPrestasi->nama_kategori,
            'tingkat' => $prestasi->tingkatPrestasi->nama_tingkat,
            'penyelenggara' => $prestasi->penyelenggara,
            'tanggal_kegiatan' => $prestasi->tanggal_kegiatan,
            'juara' => $prestasi->juara,
            'status_verifikasi' => $prestasi->status_verifikasi,
            'file_sertifikat' => $prestasi->file_sertifikat
                ? asset('storage/' . $prestasi->file_sertifikat)
                : null,
            ]
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'id_kategori' => 'required|exists:kategori_prestasis,id_kategori',
        'id_tingkat' => 'required|exists:tingkat_prestasis,id_tingkat',
        'nama_kegiatan' => 'required|string|max:255',
        'penyelenggara' => 'required|string|max:255',
        'tanggal_kegiatan' => 'required|date',
        'juara' => 'required|string|max:100',
        'file_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $file = null;

    if ($request->hasFile('file_sertifikat')) {
        $file = $request->file('file_sertifikat')
            ->store('sertifikat', 'public');
    }

    $prestasi = PrestasiMahasiswa::create([
        'id_mhs' => $request->user()->id_mhs,
        'id_kategori' => $request->id_kategori,
        'id_tingkat' => $request->id_tingkat,
        'nama_kegiatan' => $request->nama_kegiatan,
        'penyelenggara' => $request->penyelenggara,
        'tanggal_kegiatan' => $request->tanggal_kegiatan,
        'juara' => $request->juara,
        'file_sertifikat' => $file,
        'status_verifikasi' => 'Menunggu',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Prestasi berhasil diajukan.',
        'data' => [
            'id_prestasi' => $prestasi->id_prestasi,
            'nama_kegiatan' => $prestasi->nama_kegiatan,
            'status_verifikasi' => $prestasi->status_verifikasi,
        ]
    ], 201);
}
}