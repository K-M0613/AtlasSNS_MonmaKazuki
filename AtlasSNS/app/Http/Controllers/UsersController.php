<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),['username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40|Rule::unique:users->ignore(Auth::id())|email:strict',
            'bio' => 'max:150',
            'password' => 'required|alpha_dash|min:8|max:20|confirmed',
            'password_confirmation' => 'required|alpha_dash|min:8|max:20|',]);
            $user = Auth::user();
            $user->username = $request->input('username');
            $user->mail = $request->input('mail');
            $user->bio = $request->input('bio');
            $user->password = bcrypt($request->input('password'));
            $validator->Validate();
            $user->update();
            return redirect('/top');
    }

    public function search(){
        return view('users.search');
    }
}
