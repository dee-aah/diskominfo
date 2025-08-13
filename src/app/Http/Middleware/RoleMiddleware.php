<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     *
     */

    public function handle($request, Closure $next, ...$roles)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login dulu.');
    }

    if (!in_array(Auth::user()->role, $roles)) {
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }

    return $next($request);
}



}
