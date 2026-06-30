<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrestasiMahasiswa;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Dashboard Mahasiswa
        if (($user->hakAkses->nama_akses ?? null) === 'Mahasiswa') {

            $query = PrestasiMahasiswa::where('id_mhs', $user->id_mhs);

            return response()->json([
                'success' => true,
                'message' => 'Dashboard mahasiswa berhasil diambil.',
                'data' => [
                    'nama' => $user->mahasiswa->nama ?? $user->name,
                    'total_prestasi' => (clone $query)->count(),
                    'menunggu' => (clone $query)->where('status_verifikasi', 'Menunggu')->count(),
                    'terverifikasi' => (clone $query)->where('status_verifikasi', 'Terverifikasi')->count(),
                    'ditolak' => (clone $query)->where('status_verifikasi', 'Ditolak')->count(),
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Dashboard untuk role ini belum tersedia.'
        ], 403);
    }
}