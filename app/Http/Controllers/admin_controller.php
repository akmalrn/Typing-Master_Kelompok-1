<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\typing_lessons;

class admin_controller extends Controller
{
    public function HalamanAdmin()
    {
        $users = User::where('role', 'user')->get();
        return view('admin/HalamanAdmin', compact('users'));
    }


    public function HalamanDev()
    {
        return view('admin/Halamandev');
    }

    public function HalamanReadText()
    {
        $typing_lessons = typing_lessons::all();
        return view('admin/HalamanReadText', compact('typing_lessons'));
    }
}
