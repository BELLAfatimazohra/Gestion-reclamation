<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatePersonnel
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('personnel')->check()) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
