<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LobbyController;
use Illuminate\Support\Facades\Route;

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

Route::inertia('/', 'Home')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/lobby/create', [LobbyController::class, 'index']);
    Route::get('/lobby/join/{lobby?}', [LobbyController::class, 'edit']);
    Route::patch('/lobby/{lobby}', [LobbyController::class, 'update']);
    Route::delete('/lobby/delete/{lobby}', [LobbyController::class, 'destroy']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
