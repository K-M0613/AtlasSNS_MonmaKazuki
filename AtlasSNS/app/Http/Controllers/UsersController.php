<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile');
    }

    public function profileUpdate()
    {
        if($request->isMethod('post')){
            $request->validate([
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|unique:users|email:strict',
            'password' => 'required|alpha_dash|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_dash|min:8|max:20|',
            ]);
        }
        return redirect('/top');
    }

    public function search(){
        return view('users.search');
    }
}
