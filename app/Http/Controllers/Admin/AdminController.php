<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Contoh method autentikasi admin
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi user
        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika berhasil, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }
}
