<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class games_controller extends Controller
{
    public function HalamanGames()
    {
        return view('user/HalamanGames');
    }
}
