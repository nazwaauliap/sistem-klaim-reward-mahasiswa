<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KlaimReward;
use App\Models\PeriodeKlaim;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;

class KlaimRewardController extends Controller
{
    public function index(Request $request)
    {
        $idMhs = $request->user()->id_mhs;

        $klaim = KlaimReward::with([
            'prestasiMahasiswa',
            'periodeKlaim',
            'jenisReward'
        ])
        ->whereHas('prestasiMahasiswa', function ($query) use ($idMhs) {
            $query->where('id_mhs', $idMhs);
        })
        ->orderByDesc('id_klaim')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data klaim reward berhasil diambil.',
            'data' => $klaim->map(function ($item) {

                return [
                    'id_klaim' => $item->id_klaim,
                    'prestasi' => $item->prestasiMahasiswa->nama_kegiatan,
                    'reward' => $item->jenisReward->nama_reward,
                    'periode' => $item->periodeKlaim->nama_periode,
                    'tanggal_pengajuan' => $item->tanggal_pengajuan,
                    'status_klaim' => $item->status_klaim,
                    'catatan' => $item->catatan,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_prestasi' => 'required|exists:prestasi_mahasiswas,id_prestasi',
            'id_periode' => 'required|exists:periode_klaims,id_periode',
            'id_reward' => 'required|exists:jenis_rewards,id_reward',
        ]);

        $idMhs = $request->user()->id_mhs;

        $prestasi = PrestasiMahasiswa::where('id_prestasi', $request->id_prestasi)
            ->where('id_mhs', $idMhs)
            ->first();

        if (!$prestasi) {
            return response()->json([
                'success' => false,
                'message' => 'Prestasi tidak ditemukan.'
            ], 404);
        }

        if ($prestasi->status_verifikasi != 'Terverifikasi') {
            return response()->json([
                'success' => false,
                'message' => 'Prestasi belum terverifikasi.'
            ], 422);
        }

        $periode = PeriodeKlaim::find($request->id_periode);

        if ($periode->status != 'Dibuka') {
            return response()->json([
                'success' => false,
                'message' => 'Periode klaim sedang ditutup.'
            ], 422);
        }

        $cek = KlaimReward::where('id_prestasi', $request->id_prestasi)
            ->where('id_periode', $request->id_periode)
            ->exists();

        if ($cek) {
            return response()->json([
                'success' => false,
                'message' => 'Prestasi ini sudah pernah diajukan pada periode tersebut.'
            ], 422);
        }

        $klaim = KlaimReward::create([
            'id_prestasi' => $request->id_prestasi,
            'id_periode' => $request->id_periode,
            'id_reward' => $request->id_reward,
            'tanggal_pengajuan' => now()->toDateString(),
            'status_klaim' => 'Menunggu',
            'catatan' => null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Klaim reward berhasil diajukan.',
            'data' => [
                'id_klaim' => $klaim->id_klaim,
                'status_klaim' => $klaim->status_klaim,
            ]
        ], 201);
    }
}