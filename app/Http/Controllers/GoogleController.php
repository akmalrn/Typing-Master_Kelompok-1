<?php

namespace App\Http\Controllers;

use random;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\str_random;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Debug: Log information for development purposes
            Log::debug('Google User', ['user' => $googleUser]);

            // Search for the user based on the Google ID
            $findUser = User::where('id_google', $googleUser->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('user/Dashboard');
            } else {
                // Create a new user if one does not exist
                $newUser = User::create([
                    "name" => $googleUser->name,
                    "email" => $googleUser->email,
                    "id_google" => $googleUser->id,
                    "password" => '', // Secure handling for empty password
                    "email_verified_at" => now(),
                    "role" => 'user',
                ]);

                Auth::login($newUser);
                return redirect()->intended('user/Dashboard');
            }
        } catch (\Exception $e) {
            // Handle any errors
            Log::error('Google OAuth Error', ['error' => $e->getMessage()]);
            return redirect()->route('login')->withErrors(['error' => 'Unable to login using Google. Please try again.']);
        }
    }
}
