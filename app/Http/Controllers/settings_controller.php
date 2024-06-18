<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;

class settings_controller extends Controller
{
    public function HalamanSetting()
    {
        $typing_lessons = typing_lessons::all();
        return view('user/HalamanSetting', compact('typing_lessons'));
    }
}
