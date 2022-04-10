<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    public function profile() {
        if(auth()->guest()) {
            // On affiche un message d'erreur
            flash("Vous devez etre connecter pour acceder à cette page")->error();
            return redirect('/');
        }
        return view('/profile');
    }

    public function logout () {
        auth()->logout();
        flash("Vous etes bien deconnectés")->warning();
        return redirect('/');
    }

    public function updatePassword() {
        
        if(auth()->guest()) {
            // On affiche un message d'erreur
            flash("Vous devez etre connecter pour acceder à cette page")->error();
            return redirect('/');
        }
        request()->validate([
            'password'=>['required','confirmed','min:8'],
            'password_confirmation' => ['required'],
        
        ],['password.min' => "Pour des raisons de sécurité le mot de passe doit faire :min caractères"]);
        
    }
}
