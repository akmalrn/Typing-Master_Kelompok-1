<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
