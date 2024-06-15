<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class user_login extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Menangani callback dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari pengguna berdasarkan email dari Google
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika pengguna sudah ada, login
                Auth::login($user);
            } else {
                // Jika pengguna belum ada, buat pengguna baru dan login
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('password'), // Anda bisa membuat password acak jika tidak digunakan
                    'role' => 'user', // Menetapkan role default 'user'
                    'google_id' => $googleUser->getId(), // Menyimpan Google ID untuk referensi
                ]);

                Auth::login($user);
            }

            // Arahkan pengguna ke halaman yang sesuai berdasarkan peran mereka
            return redirect()->intended('/dashboard'); // Gantilah dengan rute yang sesuai untuk aplikasi Anda

        } catch (\Exception $e) {
            // Jika ada kesalahan, kembali ke halaman login dengan pesan kesalahan
            return redirect()->route('login')->with('error', 'Something went wrong, please try again.');
        }
    }

    public function LoginUser(Request $request)
{
   $request->validate([
       'email' => 'required|email',
       'password' => 'required',
   ]);

   $credentials = $request->only('email', 'password');

   if (Auth::attempt($credentials)) {
       // Pengguna berhasil login
       $user = Auth::user();

       // Periksa peran dan arahkan ke halaman yang sesuai
       if ($user->role === 'admin') {
           return redirect()->route('admin/HalamanAdmin');
       } else {
           return redirect()->route('HalamanDashboard');
       }
   } else {
       // Pengguna gagal login, kembali ke halaman login dengan pesan kesalahan
       return redirect()->route('login')->with('error', 'Invalid login credentials');
   }
}
}
