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

    public function BarisDasar()
    {
        $lesson = TypingLessons::where('lesson_title', 'Baris Dasar')->firstOrFail();

        // Pass the lesson data to the view
        return view('user/BarisDasar', ['lesson' => $lesson]);
    }

    public function storeTypingBarisDasar(Request $request)
    {
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'user-input' => 'required',
        ]);

        // Proses penyimpanan atau pengolahan hasil ketikan
        // Misalnya, Anda dapat menyimpan hasil ke dalam database atau melakukan tindakan lainnya
        // $userInput = $request->input('user-input');

        // Redirect ke halaman atau berikan umpan balik kepada pengguna
        return redirect()->back()->with('success', 'Hasil ketikan Anda berhasil disimpan!');
    }

    public function BarisAtas()
    {
        $lesson = TypingLessons::where('lesson_title', 'Baris Atas')->firstOrFail();

        return view('user/BarisAtas', compact('lesson'));
    }
    

    public function BarisBawah()
    {
        $lesson = TypingLessons::where('lesson_title', 'Baris Bawah')->firstOrFail();

        return view('user/BarisBawah', compact('lesson'));
    }

    public function Angka()
    {
        $lesson = TypingLessons::where('lesson_title', 'Angka')->firstOrFail();

        return view('user/Angka', compact('lesson'));
    }
}
