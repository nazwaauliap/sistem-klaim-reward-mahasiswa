<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $userRole = Auth::user()->hakAkses->nama_akses ?? null;
        $userRole = trim($userRole);

        $allowedRoles = array_map('trim', $roles);

        if (!in_array($userRole, $allowedRoles)) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->with('error', 'Akses tidak diizinkan.');
        }

        return $next($request);
    }
}