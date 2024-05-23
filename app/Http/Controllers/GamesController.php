<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GamesController extends Controller
{
    // Show all listings
    public function show() {

        $games = Game::all();

        return view('games.games', compact('games'));
    }

}