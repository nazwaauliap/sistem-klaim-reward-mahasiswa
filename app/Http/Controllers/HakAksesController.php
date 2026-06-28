<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index()
    {
        $hakAkses = HakAkses::orderBy('id_akses', 'asc')->get();

        return view('admin.hak-akses.index', compact('hakAkses'));
    }

    public function create()
    {
        return view('admin.hak-akses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_akses' => 'required|unique:hak_akses,nama_akses',
            'keterangan' => 'nullable',
        ]);

        HakAkses::create($request->only(['nama_akses', 'keterangan']));

        return redirect()->route('admin.hak-akses.index')
            ->with('success', 'Hak akses berhasil ditambahkan.');
    }

    public function edit(HakAkses $hakAkses)
    {
        return view('admin.hak-akses.edit', compact('hakAkses'));
    }

    public function update(Request $request, HakAkses $hakAkses)
    {
        $request->validate([
            'nama_akses' => 'required|unique:hak_akses,nama_akses,' . $hakAkses->id_akses . ',id_akses',
            'keterangan' => 'nullable',
        ]);

        $hakAkses->update($request->only(['nama_akses', 'keterangan']));

        return redirect()->route('admin.hak-akses.index')
            ->with('success', 'Hak akses berhasil diperbarui.');
    }

    public function destroy(HakAkses $hakAkses)
    {
        $hakAkses->delete();

        return redirect()->route('admin.hak-akses.index')
            ->with('success', 'Hak akses berhasil dihapus.');
    }
}
