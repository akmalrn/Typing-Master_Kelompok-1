<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use Illuminate\Http\Request;

class settings_controller extends Controller
{
    public function HalamanSetting()
    {
        $TypingLessons = TypingLessons::all();
        return view('user/HalamanSetting', compact('TypingLessons'));
    }
}
