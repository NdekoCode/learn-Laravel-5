<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function usersList ()
    {
        return view('/users', ['users' => User::all()]);
    }
    public function seeUser() {
        if(auth()->guest()) {
            flash("Vous devez etre connecter pour acceder à cette page")->error();
            return redirect("/login");
        }
        
        $email = request('email');
        // On recupere un seul utilisateur dont l'email correspond à $email
        $user = User::where('email',$email)->first();

        return view('/user',[
            'user' => $user
        ]);

    }
}
