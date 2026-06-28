<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

public function index()
{
    $mahasiswas = Mahasiswa::orderBy('nim', 'asc')->get();

    return view('mahasiswa.index', compact('mahasiswas'));
}

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'email' => 'nullable|email',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'angkatan' => 'required',
            'semester' => 'required|integer',
            'kelas' => 'nullable',
            'status_mahasiswa' => 'required',
        ]);

        Mahasiswa::create($request->only([
            'nim',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'no_hp',
            'email',
            'program_studi',
            'fakultas',
            'angkatan',
            'semester',
            'kelas',
            'status_mahasiswa',
        ]));

        return redirect()->route('admin.mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id_mhs . ',id_mhs',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'email' => 'nullable|email',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'angkatan' => 'required',
            'semester' => 'required|integer',
            'kelas' => 'nullable',
            'status_mahasiswa' => 'required',
        ]);

        $mahasiswa->update($request->only([
            'nim',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'no_hp',
            'email',
            'program_studi',
            'fakultas',
            'angkatan',
            'semester',
            'kelas',
            'status_mahasiswa',
        ]));

        return redirect()->route('admin.mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}