<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin_controller extends Controller
{
    public function HalamanDev()
    {
        return view('admin/Halamandev');
    }
}
