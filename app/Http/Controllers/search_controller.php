<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class search_controller extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::query();

        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            });
        }

        $users = $users->get();

        return view('admin/HalamanAdmin', compact('users'));
    }
}
