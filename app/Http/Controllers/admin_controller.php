<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TypingLessons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class admin_controller extends Controller
{
    public function HalamanAdmin()
    {
        $userId = Auth::id();
        $users = User::where('role', 'user')->get();
        return view('admin/HalamanAdmin', compact('users', 'userId'));
    }


    public function HalamanDev()
    {
        return view('admin/Halamandev');
    }

    public function HalamanReadText()
    {
        $userId = Auth::id();
        $TypingLessons = TypingLessons::all();
        return view('admin/HalamanReadText', compact('TypingLessons', 'userId'));
    }

    public function HalamanEditUsers($id)
    {
        // Menggunakan Eloquent untuk menemukan pengguna berdasarkan ID
        $users = User::find($id);
        return view('admin/ubah/UpdateUser', compact('users'));
    }

    // Memperbarui pengguna di basis data
    public function UpdateUsers(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6',
        ]);

        // Menggunakan Eloquent untuk memperbarui pengguna
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('HalamanAdmin')->with('success', 'User updated successfully.');
    }

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
        $lesson = TypingLessons::create([
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
        $TypingLessons = TypingLessons::findOrFail($id);
        return view('admin/ubah/UpdateText', compact('TypingLessons'));
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
        $TypingLessons = TypingLessons::findOrFail($id);
        $TypingLessons->update([
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
        $TypingLessons = TypingLessons::findOrFail($id);
        $TypingLessons->delete();

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('HalamanReadText')->with('success', 'Typing lesson deleted successfully!');
    }

}
