<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_typing_sessions;
use Illuminate\Support\Facades\Auth;

class user_typing_sessions_controller extends Controller
{
    public function store(Request $request)
    {     $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'lesson_id' => 'required|integer',
        'wpm' => 'required|numeric',
        'accuracy' => 'required|numeric',
        'errors' => 'required|integer',
        'created_at' => 'required|date',
        'updated_at' => 'required|date',
    ]);

    // Simpan data ke database
    $user_typing_sessions = user_typing_sessions::create($validatedData);

    // Beri response ke frontend (opsional)
    return response()->json(['message' => 'Typing session stored successfully', 'typing_session' => $user_typing_sessions], 201);
    }
}
