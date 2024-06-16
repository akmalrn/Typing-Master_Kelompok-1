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
        return redirect()->route('HalamanAdmin')->with('success', 'Typing lesson created successfully!');
    }

    public function HalamaEditText($id)
    {
        $typing_lessons = typing_lessons::findOrFail($id);
        return view('admin/ubah/UpdateText', compact('typing_lessons'));
    }

    // Metode untuk memperbarui data
    public function UpdateText(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'lesson_tittle' => 'required|string|max:255',
            'lessons_content' => 'required|string',
            'difficulty_level' => 'required|integer',
        ]);

        // Temukan dan perbarui lesson
        $lesson = typing_lessons::findOrFail($id);
        $lesson->update([
            'lesson_tittle' => $request->input('lesson_tittle'),
            'lessons_content' => $request->input('lessons_content'),
            'difficulty_level' => $request->input('difficulty_level'),
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('HalamanAdmin')->with('success', 'Typing lesson updated successfully!');
    }

    // Metode untuk menghapus data
    public function DestroyText($id)
    {
        $lesson = typing_lessons::findOrFail($id);
        $lesson->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('HalamanAdmin')->with('success', 'Typing lesson deleted successfully!');
    }
}

