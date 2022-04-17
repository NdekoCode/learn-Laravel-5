<?php

namespace App\Http\Controllers;
use App\User;

class newsController extends Controller
{
    public function list() {
        
        // La fonction map() est une fonction de transformation
        // La methode flattent() nous permet d'eviter d'avoir des tableaux dans des tableaux ou des tableaux avec des dispositions complexe
        /** On recupere la relation et ainsi les personnes que suis l'utilisateur
         * Puis on execute une fonction de transformation qui transforme les utilisateurs suivis en leurs messages
         * On execute une foncton qui eviter les imbrications complexes des tableaux et nous renvois juste un tableau d'un niveau
         * 
         */
        $messages = auth()->user()->follow->map(function ($user) {
            return $user->messages;
        })->flatten();

        return view('news',[
            'messages' => $messages
        ]);
    }
}
