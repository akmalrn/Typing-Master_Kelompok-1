<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;

class user_achievements_controller extends Controller
{
    public function HalamanAchievements()
    {
        $typing_lessons = typing_lessons::all();
        return view('user/UserAchievements', compact('typing_lessons'));
    }
}
