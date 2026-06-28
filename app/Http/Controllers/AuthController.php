<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        $role = $user->hakAkses->nama_akses ?? null;

        if ($role === 'Mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        }

        if (in_array($role, ['Admin', 'Super Admin'])) {
            return redirect()->route('admin.dashboard');
        }

        if ($role === 'Dosen') {
            Auth::logout();

            return redirect()->route('login')
                ->with('error', 'Halaman dosen belum dibuat.');
        }

        Auth::logout();

        return redirect()->route('login')
            ->with('error', 'Role pengguna tidak dikenali.');
    }

    return back()
        ->withInput()
        ->with('error', 'Email atau password salah.');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Berhasil logout.');
    }

    public function logoutHome(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}