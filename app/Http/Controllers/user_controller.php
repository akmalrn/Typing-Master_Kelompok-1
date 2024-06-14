<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $user = User::find($id);
        return view('users.edit', compact('user'));
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

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna dari basis data
    public function DestroyUsers($id)
    {
        // Menggunakan Eloquent untuk menghapus pengguna
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
