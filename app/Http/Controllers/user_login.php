<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class user_login extends Controller
{

    public function LoginUser(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Login berhasil, dapatkan ID pengguna
        $user = Auth::id();
       
        // Anda bisa mendapatkan detail pengguna lain jika diperlukan
        $user = Auth::user();
        $userRole = $user->role;

        // Periksa peran dan arahkan ke halaman yang sesuai
        if ($userRole === 'admin') {
            return redirect()->route('HalamanAdmin')->with('success', 'Welcome Admin!');
        } else {
            return redirect()->route('HalamanDashboard')->with('success', 'Welcome User!');
        }
    } else {
        // Login gagal, kembali ke halaman login dengan pesan kesalahan
        return redirect()->route('Welcome')->with('error', 'Invalid login credentials');
    }
        }

        public function LogoutUser(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('Welcome')->with('success', 'You have been logged out.');
        }
        public function LogoutAdmin(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('Welcome')->with('success', 'You have been logged out.');
        }
}
