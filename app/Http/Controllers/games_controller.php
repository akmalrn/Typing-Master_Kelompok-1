<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;

class games_controller extends Controller
{
    public function HalamanGames()
    {
        $typing_lessons=typing_lessons::all();
        return view('user/HalamanGames', compact('typing_lessons'));
    }
}
