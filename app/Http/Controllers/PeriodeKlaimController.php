<?php

namespace App\Http\Controllers;

use App\Models\PeriodeKlaim;
use Illuminate\Http\Request;

class PeriodeKlaimController extends Controller
{
    public function index()
    {
        $periodeKlaims = PeriodeKlaim::orderBy('id_periode', 'desc')->get();

        return view('periode-klaim.index', compact('periodeKlaims'));
    }

    public function create()
    {
        return view('periode-klaim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'periode_ke' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required',
        ]);

        PeriodeKlaim::create($request->only([
            'nama_periode',
            'semester',
            'tahun_akademik',
            'periode_ke',
            'tanggal_mulai',
            'tanggal_selesai',
            'status',
        ]));

        return redirect()->route('admin.periode-klaim.index')
            ->with('success', 'Periode klaim berhasil ditambahkan.');
    }

    public function edit(PeriodeKlaim $periodeKlaim)
    {
        return view('periode-klaim.edit', compact('periodeKlaim'));
    }

    public function update(Request $request, PeriodeKlaim $periodeKlaim)
    {
        $request->validate([
            'nama_periode' => 'required',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'periode_ke' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required',
        ]);

        $periodeKlaim->update($request->only([
            'nama_periode',
            'semester',
            'tahun_akademik',
            'periode_ke',
            'tanggal_mulai',
            'tanggal_selesai',
            'status',
        ]));

        return redirect()->route('admin.periode-klaim.index')
            ->with('success', 'Periode klaim berhasil diperbarui.');
    }

    public function destroy(PeriodeKlaim $periodeKlaim)
    {
        $periodeKlaim->delete();

        return redirect()->route('admin.periode-klaim.index')
            ->with('success', 'Periode klaim berhasil dihapus.');
    }
}