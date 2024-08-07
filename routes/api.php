<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_typing_sessions_controller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::POST('/user/BarisDasar', [App\Http\Controllers\user_typing_sessions_controller::class, 'store'])->name('store');
Route::POST('/user/BarisBawah', [App\Http\Controllers\user_typing_sessions_controller::class, 'store'])->name('store');
Route::POST('/user/BarisAtas', [App\Http\Controllers\user_typing_sessions_controller::class, 'store'])->name('store');
Route::POST('/user/Angka', [App\Http\Controllers\user_typing_sessions_controller::class, 'store'])->name('store');
