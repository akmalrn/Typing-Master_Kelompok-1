<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use Illuminate\Http\Request;

class user_achievements_controller extends Controller
{
    public function HalamanAchievements()
    {
        $TypingLessons = TypingLessons::all();
        return view('user/UserAchievements', compact('TypingLessons'));
    }
}
