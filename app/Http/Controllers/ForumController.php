<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function show(){
        return view('forum.index', ['posts' => Post::with('user')->get()]);
    }

    public function create(){
        return view('forum.create');
    }

    public function store(Request $request){
        
        $formFields = $request->validate([
            'title' => 'string|required|max:50',
            'body' => 'string|required|max:500',
        ]);

        $post = $formFields;

        // Convert anonymous to bool
        if($request['anonymous'] == true){
            $post['anonymous'] = true;
        }else{
            $post['anonymous'] = false;
        }

        $post['author_id'] = auth()->id();

        Post::create($post);

        return redirect('/forum');
    }
}
