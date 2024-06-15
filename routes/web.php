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

// Route untuk menangani callback dari Google
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::get('listuser', function () {
    return view('listuser')->with('message', 'Selamat Datang');
});
