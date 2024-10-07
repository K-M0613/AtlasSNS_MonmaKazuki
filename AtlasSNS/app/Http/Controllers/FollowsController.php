<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
class FollowsController extends Controller
{
    //
    public function followList(){
        $users = User::whereIn('id', Auth::user()->follows()->pluck('followed_id'))->get();
        // dd($user);
        $followedId = $users->pluck('id');
        $posts = Post::WhereIn('user_id', $followedId)->with('user')->orderBy('created_at', 'desc')->get();
            // dd($posts);
        return view('follows.followList', compact('users', 'posts'));
    }
    public function followerList(){
        $users = User::whereIn('id', Auth::user()->followUsers()->pluck('following_id'))->get();
        // dd($user);
        $followingId = $users->pluck('id');
        $posts = Post::WhereIn('user_id', $followingId)->with('user')->orderBy('created_at', 'desc')->get();
        return view('follows.followList', compact('users', 'posts'));
    }
}
