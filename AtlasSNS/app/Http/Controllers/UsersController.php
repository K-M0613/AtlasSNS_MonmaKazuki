<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $image = Auth::user()->images;
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|email:strict|unique:users,mail,' . $user->id,
            'bio' => 'max:150',
            'password' => 'required|alpha_dash|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_dash|min:8|max:20|',
            'images' => 'image|mimes:jpg, png, bmp, gif, svg|max:2048',
        ]);
        if ($request->hasFile('images')) {
            $image = $request->file('images')->store('public/images');
            $imageName = basename($image);
        } else {
            $imageName = $user->images;
        }
        $validator->Validate();
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->bio = $request->input('bio');
        $user->password = bcrypt($request->input('password'));
        $user->images = $imageName;
        $user->save();
        return redirect('/top');
    }

    public function userProfile($id) {
        $users = User::where('id', $id)->get();
        $posts = Post::where('user_id', $id)->get();
        return view('users.userProfile', compact('users', 'posts'));
    }

    public function search(Request $request)
    {
        $searchWord = $request->input('username');
        if ($searchWord) {
            $finds = User::where('username', 'like', '%' . $searchWord . '%')->get();
        } else {
            $finds = User::all()->except([Auth::id()]);
        }
        return view('users.search', compact('finds', 'searchWord'));
    }

    public function follow($id)
    {
        $follows = Auth::user();
        $following = $follows->isFollowing($id);
        if (!$following) {
            $follows->follow($id);
        }
        return back();
    }

    public function unfollow($id)
    {
        $follows = Auth::user();
        $following = $follows->isFollowing($id);
        if ($following) {
            $follows->unfollow($id);
        }
        return back();
    }
}
