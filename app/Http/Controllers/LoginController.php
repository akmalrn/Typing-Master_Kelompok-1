<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Sesuaikan dengan model User yang Anda miliki

class LoginController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Proses autentikasi user di sini
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                // Jika pengguna sudah terdaftar, login pengguna
                auth()->login($existingUser);
            } else {
                // Jika pengguna belum terdaftar, buat pengguna baru
                $newUser = new User();
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
                $newUser->password = bcrypt('password'); // Sesuaikan dengan kebutuhan Anda
                $newUser->save();

                // Login pengguna baru
                auth()->login($newUser);
            }

            // Redirect ke halaman yang sesuai setelah login
            return redirect()->intended('/'); // Redirect ke halaman utama setelah login
        } catch (\Exception $e) {
            // Handle jika terjadi kesalahan
            dd($e->getMessage()); // Tampilkan pesan kesalahan jika terjadi
        }
    }
}
