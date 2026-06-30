<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriPrestasi;
use App\Models\TingkatPrestasi;
use App\Models\JenisReward;

class MasterDataController extends Controller
{
    public function kategoriPrestasi()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data kategori prestasi berhasil diambil.',
            'data' => KategoriPrestasi::orderBy('nama_kategori')
                ->get([
                    'id_kategori',
                    'nama_kategori'
                ])
        ]);
    }

    public function tingkatPrestasi()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data tingkat prestasi berhasil diambil.',
            'data' => TingkatPrestasi::orderBy('nama_tingkat')
                ->get([
                    'id_tingkat',
                    'nama_tingkat'
                ])
        ]);
    }

    public function jenisReward()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data jenis reward berhasil diambil.',
            'data' => JenisReward::with('tingkatPrestasi')
                ->orderBy('nominal')
                ->get()
                ->map(function ($reward) {

                    return [
                        'id_reward' => $reward->id_reward,
                        'nama_reward' => $reward->nama_reward,
                        'nominal' => $reward->nominal,
                        'keterangan' => $reward->keterangan,
                        'tingkat' => $reward->tingkatPrestasi->nama_tingkat ?? null,
                    ];
                })
        ]);
    }
}