<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
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

        $TypingLessons = TypingLessons::query();

        if ($search) {
            $TypingLessons->where(function ($query) use ($search) {
                $query->where('difficulty_level', 'like', "%$search%");
            });
        }

        $TypingLessons = $TypingLessons->get();

        return view('admin/HalamanReadText', compact('TypingLessons'));
    }
}
