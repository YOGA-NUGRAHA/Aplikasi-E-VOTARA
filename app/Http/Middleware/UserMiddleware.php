<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'siswa') {
            return $next($request);
        }

        return redirect('/')->withErrors('Oops! Salah input nih. Coba cek lagi username atau password kamu, ya. 😉');
    }
}
