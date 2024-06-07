<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function scoreboard(){

        $users = User::orderBy('total', 'desc')->paginate(15);

        return view('pages.scoreboard', compact('users'));
    }

    public function about(){
        return view('pages.about');
    }
}