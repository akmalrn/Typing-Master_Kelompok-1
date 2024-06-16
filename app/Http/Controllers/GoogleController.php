<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        // Debug: Tampilkan informasi pengguna dari Google
        dd($user);

        // Cari pengguna berdasarkan id_google
        $findUser = User::where('id_google', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->intended('user/Dashboard');
        } else {
            // Simpan data pengguna baru jika belum ada
            $newUser = User::create([
                "name" => $user->name,
                "email" => $user->email,
                "id_google" => $user->id,
                "email_verified_at" => now(), // Sesuaikan jika diperlukan
                "role" => 'user',
            ]);

            Auth::login($newUser);
            return redirect()->intended('user/Dashboard');
        }
    } catch (\Exception $e) {
        // Tangani kesalahan yang mungkin terjadi
        dd($e);
    }
}

}
