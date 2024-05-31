<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->post = $request->input('post');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/top');
    }
}
