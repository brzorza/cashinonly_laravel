<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('pages.home');
});

// Login Register Logout
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

// User Profile
Route::get('/user/edit', [UserProfileController::class , 'showEdit']);
Route::post('/user/edit', [UserProfileController::class , 'edit']);

// Credits
Route::get('/credits', [CreditsController::class, 'show']);
Route::put('/credits/payin', [CreditsController::class, 'payin']);
Route::post('/credits/payout', [CreditsController::class, 'payout']);

// Games
Route::get('/games', [GamesController::class, 'show']);