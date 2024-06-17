<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;
use App\Models\User;

class search_controller extends Controller
{
    public function searchUser(Request $request)
    {
        $search = $request->input('searchUser');

        $users = User::query();

        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            });
        }

        $users = $users->get();

        return view('admin/HalamanAdmin', compact('users'));
    }

    public function searchText(Request $request)
    {
        $search = $request->input('searchText');

        $typing_lessons = typing_lessons::query();

        if ($search) {
            $typing_lessons->where(function ($query) use ($search) {
                $query->where('difficulty_level', 'like', "%$search%");
            });
        }

        $typing_lessons = $typing_lessons->get();

        return view('admin/HalamanReadText', compact('typing_lessons'));
    }
}
