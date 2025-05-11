<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.auth.login.index');
        }

        // Cek apakah user memiliki role admin
        if (Auth::guard('admin')->user()->role !== 'admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.auth.login.index')->with('error', 'Anda tidak memiliki akses admin.');
        }

        return $next($request);
    }
}
