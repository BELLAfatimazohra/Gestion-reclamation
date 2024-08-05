<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPersonnel
{
    public function handle($request, Closure $next, $guard = 'personnel')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
