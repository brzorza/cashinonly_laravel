<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    //Create New User
    public function store(Request $request){
        $formfields = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:8'
        ]);

        // Hash Password
        $formfields['password'] = bcrypt($formfields['password']);

        // Creare
        $user = User::create($formfields);

        //Login Created User
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formfields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have logged!');
        }else{
            return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput();
        }
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
