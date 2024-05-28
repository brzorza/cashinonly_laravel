<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    //Show user edit view
    public function showEdit(){

        $user = User::findOrFail(auth()->id());

        return view('users.edit', compact('user'));
    }
    
    public function edit(Request $request){

        $user = User::findOrFail(auth()->id());

        // validate user password
        $formfields = $request->validate([
            'password' => 'required|min:8',
        ]);

        // if user provided new password validat, hash, and assign to replace old
        if($request->filled('newPassword')){
            $formfields = $request->validate([
                'newPassword' => 'min:8',
            ]);
            //Reassign password to new hashed password
            $formfields['password'] = bcrypt($formfields['newPassword']);
        }

        // if user provided profile picutre
        if($request->hasFile('profile_picture')){
            $request->validate([
                'profile_picture' => 'image|mimes:jpeg,jpg,png,svg|max:2048',
            ]);

            $formfields['profile_picture'] = $request->profile_picture->store('images/profile_pictures', 'public');

            //Delete old profile picture 
            if(Storage::disk('public')->exists($user->profile_picture)){
                Storage::disk('public')->delete($user->profile_picture);
            }
        }

        // if user provided new name validate if it is uniqe and assing to overwrite
        if($request->filled('name')){
            $formfields = $request->validate([
                'name' => ['min:3',Rule::unique('users', 'name')],
            ]);
        }
        
        // if user provided new email validate if it is uniqe and assing to overwrite
        if($request->filled('email')){
            $formfields = $request->validate([
                'email' => ['email', Rule::unique('users', 'email')],
            ]);
        }

        if(auth()->id() == $user->id){
            $user->update($formfields);
        }else{
            abort(403, 'Unauthorized Action');
        }
        

        return redirect('users/edit')->with('message', 'Profile updated with success!');
    }
}
