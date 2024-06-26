<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function profileUpdate()
    {
        if($request->isMethod('post')){
            $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|Rule::unique:users->ignore(Auth::id())|email:strict',
            'bio' => 'max:150',
            'password' => 'required|alpha_dash|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_dash|min:8|max:20|',
            ]);
        }
            $user = Auth::user();
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->bio = $request->input('bio');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return redirect('/top');
    }

    public function search(){
        return view('users.search');
    }
}
