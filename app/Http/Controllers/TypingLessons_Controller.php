<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TypingLessons_Controller extends Controller
{
    public function HalamanTypingLessons()
    {
        // Ambil pelajaran mengetik berdasarkan ID
    $TypingLessons = TypingLessons::all();

    // Jika pelajaran tidak ditemukan, kembalikan respons 404
    if (!$TypingLessons) {
        abort(404, 'Typing TypingLessons not found.');
    }

    // Kembalikan view dengan data pelajaran
    return view('user/HalamanTypingLessons', compact('TypingLessons'));
    }
}
