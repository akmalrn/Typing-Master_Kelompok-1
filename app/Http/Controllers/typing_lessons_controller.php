<?php

namespace App\Http\Controllers;

use App\Models\typing_lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class typing_lessons_controller extends Controller
{

    public function HalamanCreateText()
    {
        return view('admin/create/CreateText');
    }

    public function CreateTypingLessons(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'lesson_title' => 'required|string|max:255',
            'lesson_content' => 'required|string',
            'difficulty_level' => 'required|string',
        ]);

        // Log request data for debugging
        Log::info('Creating Typing Lesson with data: ', $validatedData);

        // Simpan data ke database
        $lesson = typing_lessons::create([
            'lesson_title' => $request->input('lesson_title'),
            'lesson_content' => $request->input('lesson_content'),
            'difficulty_level' => $request->input('difficulty_level'),
        ]);

        // Log created lesson
        Log::info('Typing Lesson created: ', $lesson->toArray());

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('HalamanReadText')->with('success', 'Typing lesson created successfully!');
    }

    public function HalamanEditText($id)
    {
        $typing_lessons = typing_lessons::findOrFail($id);
        return view('admin/ubah/UpdateText', compact('typing_lessons'));
    }

    // Metode untuk memperbarui data
    public function UpdateText(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'lesson_title' => 'required|string|max:255',
            'lesson_content' => 'required|string',
            'difficulty_level' => 'required|string',
        ]);

        // Temukan dan perbarui lesson
        $typing_lessons = typing_lessons::findOrFail($id);
        $typing_lessons->update([
            'lesson_title' => $request->input('lesson_title'),
            'lesson_content' => $request->input('lesson_content'),
            'difficulty_level' => $request->input('difficulty_level'),
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('HalamanReadText')->with('success', 'Typing lesson updated successfully!');
    }

    // Metode untuk menghapus data
    public function DestroyText($id)
    {
        $typing_lessons = typing_lessons::findOrFail($id);
        $typing_lessons->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('HalamanReadText')->with('success', 'Typing lesson deleted successfully!');
    }

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

