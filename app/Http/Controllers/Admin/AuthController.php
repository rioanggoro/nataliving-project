<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle admin login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            // Cek apakah user memiliki role admin
            $user = Auth::guard('admin')->user();
            if ($user && $user->role === 'admin') {
                $request->session()->regenerate();
                
                // Redirect ke dashboard admin
                return redirect()->intended(route('admin.dashboard'));
            }
            
            // Logout jika bukan admin
            Auth::guard('admin')->logout();
        }

        // Jika login gagal atau bukan admin
        throw ValidationException::withMessages([
            'email' => ['Kredensial yang diberikan tidak cocok atau akun tidak memiliki akses admin.'],
        ]);
    }

    /**
     * Handle admin logout request
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login.index');
    }
}