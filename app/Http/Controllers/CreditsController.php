<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreditsController extends Controller
{
    // Show all listings
    public function show() {

        return view('pages.credits');
    }

    public function payin(Request $request){
        
        $amount = $request->validate([
            'amount' => 'required|integer|max:100',
        ]);

        $user = User::findOrFail(auth()->id());

        $user->credits += $amount['amount'];
        $user->pay_in += $amount['amount'];
        $user->total -= $amount['amount'];

        $user->save();

        return back()->with('message', 'Funds added correctly!');
    }

    public function payout(Request $request){
                
        $amount = $request->validate([
            'amount' => 'required|integer|max:100',
        ]);

        $user = User::findOrFail(auth()->id());

        $user->credits -= $amount['amount'];
        $user->pay_out += $amount['amount'];
        $user->total += $amount['amount'];

        $user->save();

        return back()->with('message', 'Funds added correctly!');
    }

}