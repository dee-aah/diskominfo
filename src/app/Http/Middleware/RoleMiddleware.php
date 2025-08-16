<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles  Daftar role yang diizinkan (misalnya: 'admin', 'user')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Periksa apakah pengguna sudah login.
        // Jika tidak, arahkan ke halaman login.
        if (!Auth::check()) {
            return redirect('login');
        }

        // 2. Ambil data pengguna yang sedang login.
        $user = Auth::user();

        // 3. Periksa apakah peran (role) pengguna ada di dalam daftar peran yang diizinkan.
        if (in_array($user->role, $roles)) {
            // 4. Jika diizinkan, lanjutkan permintaan ke halaman tujuan.
            return $next($request);
        }

        // 5. Jika tidak diizinkan, hentikan proses dan tampilkan halaman error 403 (Forbidden).
        abort(403, 'AKSES DITOLAK. ANDA TIDAK MEMILIKI HAK AKSES.');
    }
}
