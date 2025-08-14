<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Jika user belum login, redirect ke login
        if (!$user) {
            return redirect()->route('login');
        }

        // Jika parameter role dikirim sebagai "admin,user" string, ubah menjadi array
        $roles = collect($roles)
                    ->flatMap(fn($r) => explode(',', $r))
                    ->map(fn($r) => trim($r))
                    ->toArray();

        // Cek role user
        if (!in_array($user->role, $roles)) {
            return redirect('/')->with('error', 'Anda Tidak Punya Akses Ke Halaman Ini.');
        }

        return $next($request);
    }
}

