<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function formSignin () {
        if(auth()->check()) {
            return redirect('/profile')->withErrors(["global_errors"=>"Vous etes déjà connectés"]);
        }
        return view('signin');
    }
    

    public function signinTraitement()
    {
        request()->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ], [
            'password.min' => "Pour des raisons de sécurités le mot de passe doit faire :min caractères."
        ]);
        User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        $result = auth()->attempt([
            'email' =>request('email'),
            'password' => request('password')
        ]);
        if($result) {
            flash("Vous etes bien connectés")->success();
        return redirect('/profile');
        }
        flash("Information invalide")->error();
        return redirect('/signin');
    }
}
