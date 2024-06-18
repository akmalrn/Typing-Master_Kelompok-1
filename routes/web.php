<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\user_login;
use App\Http\Controllers\admin_controller;
use App\Http\Controllers\typing_lessons_controller;
use App\Http\Controllers\search_controller;
use App\Http\Controllers\games_controller;
use App\Http\Controllers\user_achievements_controller;
use App\Http\Controllers\user_profiles_controller;

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
Route::get('/user/HalamanTypingLessons/{id}', [typing_lessons_controller::class, 'HalamanTypingLessons'])->middleware('auth')->name('HalamanTypingLessons');

//User_Achievements_Controller
Route::get('/user/HalamanAchievements', [user_achievements_controller::class, 'HalamanAchievements'])->middleware('auth')->name('HalamanAchievements');

//User_Controller
Route::get('listuser', function () {
    return view('listuser')->with('message', 'Selamat Datang');
});;
Route::get('welcome', [user_controller::class, 'Welcome'])->name('Welcome');
Route::post('/welcome/registrasi', [user_controller::class, 'RegistrasiUsers'])->name('RegistrasiUsers');
Route::get('user/Dashboard', [user_controller::class, 'HalamanDashboard'])->middleware('auth')->name('HalamanDashboard');

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
Route::get('admin/HalamanDev',[admin_controller::class, 'HalamanDev'])->middleware('auth')->name('HalamanDev');
Route::get('admin/HalamanAdmin', [admin_controller::class, 'HalamanAdmin'])->middleware('auth')->name('HalamanAdmin');
Route::get('admin/HalamanReadText', [admin_controller::class, 'HalamanReadText'])->middleware('auth')->name('HalamanReadText');
Route::get('/admin/ubah/{id}/UpdateUser', [admin_controller::class, 'HalamanEditUsers'])->middleware('auth')->name('HalamanEditUsers');
Route::put('/admin/ubah/{id}/UpdateUser', [admin_controller::class, 'UpdateUsers'])->middleware('auth')->name('UpdateUsers');
Route::delete('/admin/HalamanAdmin/{id}', [admin_controller::class, 'DestroyUsers'])->name('DestroyUsers');
Route::get('admin/create/CreateText', [admin_controller::class, 'HalamanCreateText'])->middleware('auth')->name('HalamanCreateText');
Route::post('admin/create/CreateText', [admin_controller::class, 'CreateTypingLessons'])->middleware('auth')->name('CreateTypingLessons');
Route::get('/admin/ubah/{id}/UpdateText', [admin_controller::class, 'HalamanEditText'])->middleware('auth')->name('HalamanEditText');
Route::put('/admin/ubah/{id}/UpdateText', [admin_controller::class, 'UpdateText'])->middleware('auth')->name('UpdateText');
Route::delete('/admin/HalamanReadText/{id}', [admin_controller::class, 'DestroyText'])->name('DestroyText');

//middlewelare

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/HalamanAdmin', [admin_controller::class, 'HalamanAdmin'])->name('HalamanAdmin');

    // Tambahkan rute admin lainnya di sini
});

//SearchController
Route::get('/admin/HalamanAdmin/searchUser', [search_controller::class, 'searchUser'])->name('searchUser');
Route::get('/admin/HalamanAdmin/searchText', [search_controller::class, 'searchText'])->name('searchText');

//GamesController
Route::get('/user/HalamanGames', [games_controller::class, 'HalamanGames'])->middleware('auth')->name('HalamanGames');



//UserProfile
Route::get('/user/HalamanUser/{id}', [user_profiles_controller::class, 'HalamanUserProfile'])->middleware('auth')->name('HalamanUser');
