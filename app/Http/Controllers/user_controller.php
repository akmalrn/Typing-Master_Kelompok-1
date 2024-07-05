<?php

namespace App\Http\Controllers;

use App\Models\TypingLessons;
use App\Models\user_typing_sessions;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class user_controller extends Controller
{
    public function Welcome()
    // Menggunakan Eloquent ORM untuk mengambil semua pengguna
    {
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

    public function HalamanDashboard()
{
    $userId = Auth::id(); // Get the ID of the currently authenticated user
    $TypingLessons = TypingLessons::all(); // Get all typing lessons
    $users = User::all(); // Get all users

    // Calculate average statistics for the logged-in user
    $averageStats = user_typing_sessions::where('user_id', $userId)
                    ->selectRaw('AVG(wpm) as avg_wpm, AVG(accuracy) as avg_accuracy, AVG(errors) as avg_errors')
                    ->first();

    // Use default values if there is no data
    $avgWPM = $averageStats->avg_wpm ? round($averageStats->avg_wpm, 2) : 'XX';
    $avgAccuracy = $averageStats->avg_accuracy ? round($averageStats->avg_accuracy, 2) . '%' : 'XX%';
    $avgErrors = $averageStats->avg_errors ? round($averageStats->avg_errors, 2) . '%' : 'XX%';

    return view('user/Dashboard', compact('users', 'TypingLessons', 'userId', 'avgWPM', 'avgAccuracy', 'avgErrors'));
}

    public function HalamanGames()
    {
        $userId = Auth::id();

        // Tampilkan view 'HalamanGames' dan kirimkan userId ke view tersebut
        return view('user/HalamanGames', ['userId' => $userId]);
    }

}
