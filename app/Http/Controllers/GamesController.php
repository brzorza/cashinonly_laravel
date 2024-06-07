<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GamesController extends Controller
{
    // Show all listings
    public function show() {

        $games = Game::all();

        return view('games.games', compact('games'));
    }

    public function dice_roll(){
        return view('games.dice_roll');
    }

    public function dice_roll_bet(Request $request){
        
        $user = User::findOrFail(auth()->id());
        $game = Game::where('name', 'dice_roll')->first();

        // dd($game);

        $randomNumber = rand(1, 6);

        $formfields = $request->validate([
            'bet_amount' => 'required|between:1,1000|integer',
            'guessed_number' => 'required|between:1,6|integer'
        ], [
            'bet_amount.between' => 'Max bet amount is 1000cr.',
            'guessed_number.between' => 'Guess numbers from 1-6.',
        ]);

        if($user->credits < $formfields['bet_amount']){
            return back()->withErrors(['bet_amount' => "You don't have enought credits!"]);
        }

        if($randomNumber == $formfields['guessed_number']){
        
            $user->credits += $formfields['bet_amount'] * $game->multiplier;
            $game->pay_out += $formfields['bet_amount'] * $game->multiplier;
            $game->total -= $formfields['bet_amount'] * $game->multiplier;

            $user->save();
            $game->save();
            
            return back()->with([
                'message' => 'Number was ' . $randomNumber . '. You have won ' . $formfields['bet_amount'] * $game->multiplier . 'cr!',
                'randomNumber' => $randomNumber
            ]);
        }else{

            $user->credits -= $formfields['bet_amount'];
            $game->pay_in += $formfields['bet_amount'];
            $game->total += $formfields['bet_amount'];

            $user->save();
            $game->save();

            return back()->with([
                'message-fail' => 'Number was ' . $randomNumber . '. You have lost ' . $formfields['bet_amount'] . 'cr!',
                'randomNumber' => $randomNumber
            ]);
        }

    }

    public function bombs(Request $request){
        return view('/games/bombs');
    }

    public function bombs_bet(Request $request){

        $formFields = $request->validate([
            'board_size' => 'required|integer|between:4,7',
            'bombs_number' => 'required|integer'
        ]);

        return view('/games/bombs')->with('');
    }
}