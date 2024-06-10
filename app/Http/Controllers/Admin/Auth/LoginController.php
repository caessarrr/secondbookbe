<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        // Jika berhasil, periksa apakah pengguna memiliki peran admin
        $user = Auth::guard('admin')->user();
        if ($user->roles()->where('role_name', 'admin')->exists()) {
            // Jika pengguna memiliki peran admin, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika bukan admin, logout dan kembali ke halaman login dengan pesan error
            Auth::guard('admin')->logout();
            return redirect()->back()->withErrors(['email' => 'Anda tidak memiliki izin untuk mengakses halaman admin.']);
        }
    }

    return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
}

public function logout()
{
    Auth::logout();
    return redirect()->route('admin.login');
}

}
