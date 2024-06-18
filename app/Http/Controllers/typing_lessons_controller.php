<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class typing_lessons_controller extends Controller
{
    public function HalamanTypingLessons($id)
    {
        // Ambil pelajaran mengetik berdasarkan ID
    $typing_lessons = typing_lessons::find($id);

    // Jika pelajaran tidak ditemukan, kembalikan respons 404
    if (!$typing_lessons) {
        abort(404, 'Typing typing_lessons not found.');
    }

    // Kembalikan view dengan data pelajaran
    return view('user/HalamanTypingLessons', compact('typing_lessons'));
    }
}

