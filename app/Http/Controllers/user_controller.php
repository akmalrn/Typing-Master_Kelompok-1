<?php

namespace App\Http\Controllers;

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

    // Menghapus pengguna dari basis data
    public function DestroyUsers($id)
    {
        // Menggunakan Eloquent untuk menghapus pengguna
        User::find($id)->delete();
        return redirect()->route('HalamanAdmin')->with('success', 'User deleted successfully.');
    }

    public function HalamanDashboard()
    {
        $users = User::all();
        return view('user/Dashboard', compact('users'));
    }
    public function HalamanGames()
    {
        return view('user/HalamanGames');
    }
    public function HalamanUser()
    {
        return view('user/UserProfiles');
    }
    public function HalamanAchievements()
    {
        return view('user/UserAchievements');
    }
}
