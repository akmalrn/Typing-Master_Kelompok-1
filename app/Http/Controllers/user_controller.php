<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class user_controller extends Controller
{
    public function Welcome()
    {
        // Menggunakan Eloquent ORM untuk mengambil semua pengguna
        $users = User::all();
        return view('welcome', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru
    public function HalamanRegistrasiUsers()
    {
        return view('users.create');
    }

    // Menyimpan pengguna baru ke basis data
    public function RegistrasiUsers(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Menggunakan Eloquent untuk membuat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',  // Menyimpan role
        ]);
        return redirect()->route('Welcome')->with('success', 'User created successfully.');
    }

    // Menampilkan pengguna berdasarkan ID
    public function HalamanReadUsers($id)
    {
        // Menggunakan Eloquent untuk menemukan pengguna berdasarkan ID
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    // Menampilkan form untuk mengedit pengguna

    // Menghapus pengguna dari basis data
    public function DestroyUsers($id)
    {
        // Menggunakan Eloquent untuk menghapus pengguna
        User::find($id)->delete();
        return redirect()->route('HalamanAdmin')->with('success', 'User deleted successfully.');
    }

    public function HalamanDashboard()
    {
        $userId = Auth::id();
        $TypingLessons = TypingLessons::all();
        $users = User::all();
        return view('user/Dashboard', compact('users', 'TypingLessons', 'userId'));
    }
    public function HalamanGames()
    {
        $userId = Auth::id();

        // Tampilkan view 'HalamanGames' dan kirimkan userId ke view tersebut
        return view('user/HalamanGames', ['userId' => $userId]);
    }

}
