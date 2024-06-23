<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function HalamanDeveloper()
    {
        $typing_lessons=typing_lessons::all();
        return view('user/halamandev', compact('typing_lessons'));
    }
}
