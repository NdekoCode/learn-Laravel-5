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
         * On execute une foncton qui eviter les imbrications complexes des tableaux et nous renvois juste un tableau d'un niveau simple
         * On trie nos messages obtenus selon leurs date de publication et en ayant vers le plus recent
         * 
         * map->message  et sortByDesc->created_at:Laravel Array Order Proxy c'est pas du php, c'est du laravel, imaginer que cela equivaut à: 
         *  map(function ($user) { return $user->messages; }) et sortByDesc(function (message) { message->created_at})
         */
        $messages = auth()->user()->follow->map->messages->flatten()->sortByDesc->created_at;
        // On peut remplacer encore ce code par
        /**
         * auth()-user()->follow->flapMap->message->orderByDesc->created_at
         */

        return view('news',[
            'messages' => $messages
        ]);
    }
}
