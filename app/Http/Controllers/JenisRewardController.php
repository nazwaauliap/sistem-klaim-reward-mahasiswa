<?php

namespace App\Http\Controllers;

use App\Models\JenisReward;
use App\Models\TingkatPrestasi;
use Illuminate\Http\Request;

class JenisRewardController extends Controller
{
    public function index()
    {
        $jenisRewards = JenisReward::with('tingkatPrestasi')
            ->orderBy('id_reward', 'desc')
            ->get();

        return view('jenis-reward.index', compact('jenisRewards'));
    }

    public function create()
    {
        $tingkatPrestasis = TingkatPrestasi::all();

        return view('jenis-reward.create', compact('tingkatPrestasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tingkat' => 'required',
            'nama_reward' => 'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);

        JenisReward::create($request->only([
            'id_tingkat',
            'nama_reward',
            'nominal',
            'keterangan',
        ]));

        return redirect()->route('admin.jenis-reward.index')
            ->with('success', 'Jenis reward berhasil ditambahkan.');
    }

    public function edit(JenisReward $jenisReward)
    {
        $tingkatPrestasis = TingkatPrestasi::all();

        return view('jenis-reward.edit', compact('jenisReward', 'tingkatPrestasis'));
    }

    public function update(Request $request, JenisReward $jenisReward)
    {
        $request->validate([
            'id_tingkat' => 'required',
            'nama_reward' => 'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'nullable',
        ]);

        $jenisReward->update($request->only([
            'id_tingkat',
            'nama_reward',
            'nominal',
            'keterangan',
        ]));

        return redirect()->route('admin.jenis-reward.index')
            ->with('success', 'Jenis reward berhasil diperbarui.');
    }

    public function destroy(JenisReward $jenisReward)
    {
        $jenisReward->delete();

        return redirect()->route('admin.jenis-reward.index')
            ->with('success', 'Jenis reward berhasil dihapus.');
    }
}