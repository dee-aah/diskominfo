<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            return redirect()->route('artikell.dashboard')
                ->with('error', ' Anda tidak memiliki akses ke halaman ini!');
        }

        return $next($request);
    }
}
