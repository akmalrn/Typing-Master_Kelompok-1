<?php

// app/Http/Controllers/Auth/SocialController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman login Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Menangani callback dari Google setelah login.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong or you cancelled the login.');
        }

        // Temukan atau buat pengguna berdasarkan email dari Google
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Login jika pengguna sudah ada
            Auth::login($existingUser);
        } else {
            // Buat pengguna baru dan login
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(Str::random(24)),
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended('/home');
    }
}

