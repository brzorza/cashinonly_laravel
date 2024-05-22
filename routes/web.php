<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GamesController;

Route::get('/', function () {
    return view('pages.home');
});

// Login Register Logout
Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

// Games
Route::get('/games', [GamesController::class, 'index']);