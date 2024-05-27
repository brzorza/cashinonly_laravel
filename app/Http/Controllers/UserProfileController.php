<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //Show user edit view
    public function showEdit(){

        $user = User::findOrFail(auth()->id());

        return view('users.edit', compact('user'));
    }
    
    public function edit(){

    }
}
