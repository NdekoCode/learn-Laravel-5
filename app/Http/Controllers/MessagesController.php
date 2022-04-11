<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function new() {
        request()->validate([
            'message' =>['required','min:3']
        ]);
        Message::create([
            'content' =>request('message'),
            // L'identifiant de l'utilisateur connecté
            'user_id' => auth()->id()
            ]);
        flash('Votre message a été publié avec succés')->success();
        return back();
    }
}
