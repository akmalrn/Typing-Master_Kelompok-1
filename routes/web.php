<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\user_login;
use App\Http\Controllers\admin_controller;
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
Route::get('listuser', function () {
    return view('listuser')->with('message', 'Selamat Datang');
});
Route::get('/listuser', [user_controller::class, 'listuser'])->name('listuser');
Route::get('welcome', [user_controller::class, 'Welcome'])->name('Welcome');
Route::post('/welcome/registrasi', [user_controller::class, 'RegistrasiUsers'])->name('RegistrasiUsers');
Route::get('user/Dashboard', [user_controller::class, 'HalamanDashboard'])->name('HalamanDashboard');

//User Login
Route::post('/welcome/login', [user_login::class, 'LoginUser'])->name('LoginUser');
Route::get('/LogoutUser', [user_login::class, 'LogoutUser'])->name('LogoutUser');
Route::post('/logout', [user_login::class, 'LogoutAdmin'])->name('LogoutAdmin');

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

//AdminController
Route::get('admin/HalamanDev',[admin_controller::class, 'HalamanDev'])->name('HalamanDev');

