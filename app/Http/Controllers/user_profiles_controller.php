<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use App\Models\User;
use Illuminate\Http\Request;

class user_profiles_controller extends Controller
{
    public function HalamanUserProfile($id)
    {
        $TypingLessons = TypingLessons::all();
        $user = User::find($id);

    if ($user && $user->role == 'user') {
        // Lakukan sesuatu dengan ID pengguna yang login
        return view('user/UserProfiles', compact('user', 'TypingLessons'));
    } else {
        // Jika bukan admin atau tidak ditemukan, redirect atau berikan respons lain
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
    }
}
