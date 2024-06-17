<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use App\Models\User;
use Illuminate\Http\Request;

class user_profiles_controller extends Controller
{
    public function HalamanUserProfile($id)
    {
        $typing_lessons = typing_lessons::all();
        $user = User::find($id);

    if ($user && $user->role == 'user') {
        // Lakukan sesuatu dengan ID pengguna yang login
        return view('user/UserProfiles', compact('user', 'typing_lessons'));
    } else {
        // Jika bukan admin atau tidak ditemukan, redirect atau berikan respons lain
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
    }
}
