<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use Illuminate\Http\Request;

class games_controller extends Controller
{
    public function HalamanGames()
    {
        $TypingLessons=TypingLessons::all();
        return view('user/HalamanGames', compact('TypingLessons'));
    }
}
