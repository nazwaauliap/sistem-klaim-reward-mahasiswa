<?php

namespace App\Http\Controllers;

use App\Models\TingkatPrestasi;
use Illuminate\Http\Request;

class TingkatPrestasiController extends Controller
{
    public function index()
    {
        $tingkatPrestasis = TingkatPrestasi::orderBy('id_tingkat', 'desc')->get();

        return view('tingkat-prestasi.index', compact('tingkatPrestasis'));
    }

    public function create()
    {
        return view('tingkat-prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tingkat' => 'required',
            'deskripsi' => 'nullable',
        ]);

        TingkatPrestasi::create($request->only([
            'nama_tingkat',
            'deskripsi',
        ]));

        return redirect()->route('admin.tingkat-prestasi.index')
            ->with('success', 'Tingkat prestasi berhasil ditambahkan.');
    }

    public function edit(TingkatPrestasi $tingkatPrestasi)
    {
        return view('tingkat-prestasi.edit', compact('tingkatPrestasi'));
    }

    public function update(Request $request, TingkatPrestasi $tingkatPrestasi)
    {
        $request->validate([
            'nama_tingkat' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $tingkatPrestasi->update($request->only([
            'nama_tingkat',
            'deskripsi',
        ]));

        return redirect()->route('admin.tingkat-prestasi.index')
            ->with('success', 'Tingkat prestasi berhasil diperbarui.');
    }

    public function destroy(TingkatPrestasi $tingkatPrestasi)
    {
        $tingkatPrestasi->delete();

        return redirect()->route('admin.tingkat-prestasi.index')
            ->with('success', 'Tingkat prestasi berhasil dihapus.');
    }
}