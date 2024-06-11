<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CreditsController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('pages.home');
});

// About / Scoreboard
Route::get('/about' , [PagesController::class, 'about']);
Route::get('/scoreboard' , [PagesController::class, 'scoreboard']);

// Forum
Route::get('/forum', [ForumController::class , 'show']);
Route::get('/forum/create', [ForumController::class , 'create']);
Route::post('/forum/create', [ForumController::class , 'store']);

// Login Register Logout
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

// User Profile
Route::get('/users/edit', [UserProfileController::class , 'showEdit']);
Route::post('/users/edit', [UserProfileController::class , 'edit']);

// Credits
Route::get('/credits', [CreditsController::class, 'show']);
Route::put('/credits/payin', [CreditsController::class, 'payin']);
Route::post('/credits/payout', [CreditsController::class, 'payout']);

// Games
Route::get('/games', [GamesController::class, 'show']);

Route::get('/games/dice_roll', [GamesController::class, 'dice_roll']);
Route::post('/games/dice_roll', [GamesController::class, 'dice_roll_bet']);

Route::get('/games/bombs', [GamesController::class, 'bombs']);
Route::post('/games/bombs', [GamesController::class, 'bombs_bet']);