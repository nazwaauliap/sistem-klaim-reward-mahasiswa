<?php

namespace App\Http\Controllers;

use App\Models\KlaimReward;
use App\Services\FuzzyRewardService;
use Illuminate\Http\Request;

class AdminKlaimRewardController extends Controller
{
    public function index()
    {
        $klaimRewards = KlaimReward::with([
            'prestasiMahasiswa.mahasiswa',
            'prestasiMahasiswa.tingkatPrestasi',
            'periodeKlaim',
            'jenisReward'
        ])
            ->orderBy('id_klaim', 'desc')
            ->get();

        return view('admin-klaim-reward.index', compact('klaimRewards'));
    }

    public function edit(KlaimReward $klaimReward)
    {
        $klaimReward->load([
            'prestasiMahasiswa.mahasiswa',
            'prestasiMahasiswa.kategoriPrestasi',
            'prestasiMahasiswa.tingkatPrestasi',
            'periodeKlaim',
            'jenisReward'
        ]);

        $hasilFuzzy = app(FuzzyRewardService::class)
            ->calculate($klaimReward->prestasiMahasiswa);

        return view('admin-klaim-reward.edit', compact('klaimReward', 'hasilFuzzy'));
    }

    public function update(Request $request, KlaimReward $klaimReward)
    {
        $request->validate([
            'status_klaim' => 'required|in:Menunggu,Disetujui,Ditolak',
            'catatan' => 'nullable',
        ]);

        $klaimReward->update([
            'status_klaim' => $request->status_klaim,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('admin.klaim-reward.index')
            ->with('success', 'Status klaim reward berhasil diperbarui.');
    }
}
