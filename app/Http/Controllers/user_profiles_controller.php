<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use App\Models\User;
use App\Models\user_typing_sessions;
use Illuminate\Http\Request;

class user_profiles_controller extends Controller
{
    public function HalamanUserProfile($id)
    {
        $TypingLessons = TypingLessons::all();
        $user = User::find($id);

        if ($user && $user->role == 'user') {
            // Ambil sesi mengetik dengan WPM tertinggi
            $highestWPM = user_typing_sessions::where('user_id', $id)
                            ->orderBy('wpm', 'desc')
                            ->first();

            if ($highestWPM) {
                $maxWPM = $highestWPM->wpm;
                $maxAccuracy = $highestWPM->accuracy;
                $maxError = $highestWPM->error;
            } else {
                $maxWPM = 'XX';
                $maxAccuracy = 'XX%';
                $maxError = 'XX%';
            }

            return view('user/UserProfiles', compact('user', 'TypingLessons', 'maxWPM', 'maxAccuracy', 'maxError'));
        } else {
            // Jika bukan admin atau tidak ditemukan, redirect atau berikan respons lain
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
}

}
