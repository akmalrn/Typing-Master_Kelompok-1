<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\user_controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('welcome')->with('message', 'Selamat Datang');
});
Route::get('/welcome', function () {
    return view('welcome'); // Sesuaikan dengan tampilan atau controller yang sesuai
})->name('Welcome');
//Achievements_Controller


//Feedback_Controller


//Leaderboard_Controller


//Setting_Controller


//Typing_Lessons_Controller


//User_Achievements_Controller


//User_Controller
Route::get('users', [user_controller::class, 'index'])->name('users.index');
Route::get('welcome', [user_controller::class, 'Welcome'])->name('Welcome');
Route::post('welcome', [user_controller::class, 'RegistrasiUsers'])->name('RegistrasiUsers');
Route::get('users/{user}', [user_controller::class, 'show'])->name('users.show');
Route::get('users/{user}/edit', [user_controller::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [user_controller::class, 'update'])->name('users.update');
Route::delete('users/{user}', [user_controller::class, 'destroy'])->name('users.destroy');

//User_Typing_Sessions_Controller


//Google
// Route untuk mengarahkan pengguna ke halaman login Google
Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('auth.google.callback');


//Middlewelare
// Ini bisa diterapkan ke rute apapun yang perlu memeriksa dan mengarahkan berdasarkan peran
Route::get('/dashboard', function () {
    // Halaman yang ingin Anda tampilkan setelah redirection jika tidak di-handle oleh middleware
})->middleware('role/redirect');
Route::middleware(['auth', 'role/redirect'])->group(function () {
    // Ini akan diterapkan ke semua rute dalam grup ini
    Route::get('/dashboard', function () {
        // Halaman dasbor
    });

    // Tambahkan lebih banyak rute yang memerlukan pemeriksaan peran dan redirection di sini
});

