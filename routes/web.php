<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\user_login;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\typing_lessons_controller;
use App\Http\Controllers\search_controller;
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

Route::get('admin/create/CreateText', [typing_lessons_controller::class, 'HalamanCreateText'])->name('HalamanCreateText');
Route::post('admin/create/CreateText', [typing_lessons_controller::class, 'CreateTypingLessons'])->name('CreateTypingLessons');
Route::get('/admin/ubah/{id}/UpdateText', [typing_lessons_controller::class, 'HalamanEditText'])->name('HalamanEditText');
Route::put('/admin/ubah/{id}/UpdateText', [typing_lessons_controller::class, 'UpdateText'])->name('UpdateText');
Route::delete('/admin/HalamanReadText/{id}', [typing_lessons_controller::class, 'DestroyText'])->name('DestroyText');

//User_Achievements_Controller


//User_Controller
Route::get('listuser', function () {
    return view('listuser')->with('message', 'Selamat Datang');
});;
Route::get('welcome', [user_controller::class, 'Welcome'])->name('Welcome');
Route::post('/welcome/registrasi', [user_controller::class, 'RegistrasiUsers'])->name('RegistrasiUsers');
Route::get('user/Dashboard', [user_controller::class, 'HalamanDashboard'])->name('HalamanDashboard');
Route::get('/admin/ubah/{id}/UpdateUser', [user_controller::class, 'HalamanEditUsers'])->name('HalamanEditUsers');
Route::put('/admin/ubah/{id}/UpdateUser', [user_controller::class, 'UpdateUsers'])->name('UpdateUsers');
Route::delete('/admin/HalamanAdmin/{id}', [user_controller::class, 'DestroyUsers'])->name('DestroyUsers');
Route::get('user/HalamanGames', [user_controller::class, 'HalamanGames'])->name('HalamanGames');

//User Login
Route::post('/welcome/login', [user_login::class, 'LoginUser'])->name('LoginUser');
Route::get('/LogoutUser', [user_login::class, 'LogoutUser'])->name('LogoutUser');
Route::post('/LogoutAdmin', [user_login::class, 'LogoutAdmin'])->name('LogoutAdmin');


//User_Typing_Sessions_Controller


//Google
// Route untuk mengarahkan pengguna ke halaman login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


//AdminController
Route::get('admin/HalamanDev',[admin_controller::class, 'HalamanDev'])->name('HalamanDev');
Route::get('admin/HalamanAdmin', [admin_controller::class, 'HalamanAdmin'])->name('HalamanAdmin');
Route::get('admin/HalamanReadText', [admin_controller::class, 'HalamanReadText'])->name('HalamanReadText');
Route::get('/user/dashboard', [user_controller::class, 'HalamanDashboard'])->name('HalamanDashboard');
//middlewelare

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/HalamanAdmin', [admin_controller::class, 'HalamanAdmin'])->name('HalamanAdmin');
    
    // Tambahkan rute admin lainnya di sini
});


Route::get('/admin/HalamanAdmin/search', [search_controller::class, 'search'])->name('search');
