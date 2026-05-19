<?php

namespace App\Http\Controllers;

use App\Models\KlaimReward;
use App\Models\PencairanReward;
use Illuminate\Http\Request;

class PencairanRewardController extends Controller
{
    public function index()
    {
        $pencairanRewards = PencairanReward::with([
            'klaimReward.prestasiMahasiswa.mahasiswa',
            'klaimReward.prestasiMahasiswa.tingkatPrestasi',
            'klaimReward.jenisReward',
            'klaimReward.periodeKlaim'
        ])
            ->orderBy('id_pencairan', 'desc')
            ->get();

        return view('pencairan-reward.index', compact('pencairanRewards'));
    }

    public function create()
    {
        $klaimRewards = KlaimReward::with([
            'prestasiMahasiswa.mahasiswa',
            'prestasiMahasiswa.tingkatPrestasi',
            'jenisReward',
            'periodeKlaim'
        ])
            ->where('status_klaim', 'Disetujui')
            ->whereDoesntHave('pencairanReward')
            ->orderBy('id_klaim', 'desc')
            ->get();

        return view('pencairan-reward.create', compact('klaimRewards'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_klaim' => 'required',
            'nominal_dicairkan' => 'required|numeric',
            'tanggal_pencairan' => 'required|date',
            'status_pencairan' => 'required|in:Diproses,Selesai',
            'keterangan' => 'nullable',
        ]);

        PencairanReward::create($request->only([
            'id_klaim',
            'nominal_dicairkan',
            'tanggal_pencairan',
            'status_pencairan',
            'keterangan',
        ]));

        return redirect()->route('admin.pencairan-reward.index')
            ->with('success', 'Data pencairan reward berhasil ditambahkan.');
    }

    public function edit(PencairanReward $pencairanReward)
    {
        $klaimRewards = KlaimReward::with([
            'prestasiMahasiswa.mahasiswa',
            'prestasiMahasiswa.tingkatPrestasi',
            'jenisReward',
            'periodeKlaim'
        ])
            ->where('status_klaim', 'Disetujui')
            ->get();

        return view('pencairan-reward.edit', compact('pencairanReward', 'klaimRewards'));
    }

    public function update(Request $request, PencairanReward $pencairanReward)
    {
        $request->validate([
            'id_klaim' => 'required',
            'nominal_dicairkan' => 'required|numeric',
            'tanggal_pencairan' => 'required|date',
            'status_pencairan' => 'required|in:Diproses,Selesai',
            'keterangan' => 'nullable',
        ]);

        $pencairanReward->update($request->only([
            'id_klaim',
            'nominal_dicairkan',
            'tanggal_pencairan',
            'status_pencairan',
            'keterangan',
        ]));

        return redirect()->route('admin.pencairan-reward.index')
            ->with('success', 'Data pencairan reward berhasil diperbarui.');
    }

    public function destroy(PencairanReward $pencairanReward)
    {
        $pencairanReward->delete();

        return redirect()->route('admin.pencairan-reward.index')
            ->with('success', 'Data pencairan reward berhasil dihapus.');
    }
}