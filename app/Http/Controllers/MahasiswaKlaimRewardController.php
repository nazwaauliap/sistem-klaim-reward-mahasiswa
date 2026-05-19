<?php

namespace App\Http\Controllers;

use App\Models\KlaimReward;
use App\Models\PrestasiMahasiswa;
use App\Models\PeriodeKlaim;
use App\Models\JenisReward;
use Illuminate\Http\Request;

class MahasiswaKlaimRewardController extends Controller
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

        return view('mahasiswa-panel.klaim-reward.index', compact('klaimRewards'));
    }

    public function create()
    {
        $prestasiTerverifikasi = PrestasiMahasiswa::with([
            'mahasiswa',
            'tingkatPrestasi'
        ])
            ->where('status_verifikasi', 'Terverifikasi')
            ->orderBy('id_prestasi', 'desc')
            ->get();

        $periodeDibuka = PeriodeKlaim::where('status', 'Dibuka')
            ->orderBy('id_periode', 'desc')
            ->get();

        $jenisRewards = JenisReward::with('tingkatPrestasi')
            ->orderBy('id_reward', 'desc')
            ->get();

        return view('mahasiswa-panel.klaim-reward.create', compact(
            'prestasiTerverifikasi',
            'periodeDibuka',
            'jenisRewards'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_prestasi' => 'required',
            'id_periode' => 'required',
            'id_reward' => 'required',
        ]);

        $prestasi = PrestasiMahasiswa::findOrFail($request->id_prestasi);
        $periode = PeriodeKlaim::findOrFail($request->id_periode);

        if ($prestasi->status_verifikasi !== 'Terverifikasi') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Prestasi belum terverifikasi, sehingga belum bisa diajukan klaim reward.');
        }

        if ($periode->status !== 'Dibuka') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Periode klaim sedang tidak dibuka.');
        }

        $klaimSudahAda = KlaimReward::where('id_prestasi', $request->id_prestasi)
            ->where('id_periode', $request->id_periode)
            ->first();

        if ($klaimSudahAda) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Prestasi ini sudah pernah diajukan klaim pada periode tersebut.');
        }

        KlaimReward::create([
            'id_prestasi' => $request->id_prestasi,
            'id_periode' => $request->id_periode,
            'id_reward' => $request->id_reward,
            'tanggal_pengajuan' => now()->toDateString(),
            'status_klaim' => 'Menunggu',
            'catatan' => null,
        ]);

        return redirect()->route('mahasiswa.klaim-reward.index')
            ->with('success', 'Klaim reward berhasil diajukan dan menunggu proses admin.');
    }
}