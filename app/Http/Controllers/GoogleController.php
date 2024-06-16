<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan Anda mengimpor model User yang benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Mencari pengguna berdasarkan id_google
            $findUser = User::where('id_google', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/');
            } else {
                // Menyimpan data user baru jika belum ada
                $newUser = User::create([
                    "name" => $user->name,
                    "email" => $user->email,
                    "password" => '',
                    "id_google" => $user->id,
                    // Sesuaikan dengan struktur data yang benar dari Socialite
                    "email_verified_at" => now(), // Anda dapat menggunakan helper now() untuk waktu saat ini
                ]);

                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            dd($e->getMessage());
        }
    }
}
