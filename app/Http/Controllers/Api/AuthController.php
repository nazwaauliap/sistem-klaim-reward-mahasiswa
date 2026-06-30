<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.',
            ], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('sikarema-mobile')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil.',
            'data' => [
                'token' => $token,
                'user' => [
                    'id'    => $user->id,
                    'name'  => $user->name,
                    'email' => $user->email,
                    'role'  => $user->hakAkses->nama_akses ?? null,
                ]
            ]
        ]);
    }

    public function profile(Request $request)
    {
        $user = $request->user()->load([
            'hakAkses',
            'mahasiswa',
            'dosen',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Profil pengguna berhasil diambil.',
            'data' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => $user->hakAkses->nama_akses ?? null,

                'mahasiswa' => $user->mahasiswa ? [
                    'nim' => $user->mahasiswa->nim,
                    'nama' => $user->mahasiswa->nama,
                    'program_studi' => $user->mahasiswa->program_studi,
                    'fakultas' => $user->mahasiswa->fakultas,
                    'angkatan' => $user->mahasiswa->angkatan,
                    'semester' => $user->mahasiswa->semester,
                    'kelas' => $user->mahasiswa->kelas,
                    'status' => $user->mahasiswa->status_mahasiswa,
                ] : null,

                'dosen' => $user->dosen ? [
                    'nidn' => $user->dosen->nidn,
                    'nama' => $user->dosen->nama,
                ] : null,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil.'
        ]);
    }
}