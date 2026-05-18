<?php

namespace App\Http\Controllers;

use App\Models\KategoriPrestasi;
use Illuminate\Http\Request;

class KategoriPrestasiController extends Controller
{
    public function index()
    {
        $kategoriPrestasis = KategoriPrestasi::orderBy('id_kategori', 'desc')->get();

        return view('kategori-prestasi.index', compact('kategoriPrestasis'));
    }

    public function create()
    {
        return view('kategori-prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        KategoriPrestasi::create($request->only([
            'nama_kategori',
            'deskripsi',
        ]));

        return redirect()->route('admin.kategori-prestasi.index')
            ->with('success', 'Kategori prestasi berhasil ditambahkan.');
    }

    public function edit(KategoriPrestasi $kategoriPrestasi)
    {
        return view('kategori-prestasi.edit', compact('kategoriPrestasi'));
    }

    public function update(Request $request, KategoriPrestasi $kategoriPrestasi)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kategoriPrestasi->update($request->only([
            'nama_kategori',
            'deskripsi',
        ]));

        return redirect()->route('admin.kategori-prestasi.index')
            ->with('success', 'Kategori prestasi berhasil diperbarui.');
    }

    public function destroy(KategoriPrestasi $kategoriPrestasi)
    {
        $kategoriPrestasi->delete();

        return redirect()->route('admin.kategori-prestasi.index')
            ->with('success', 'Kategori prestasi berhasil dihapus.');
    }
}