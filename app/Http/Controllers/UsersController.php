<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function usersList ()
    {
        return view('/users', ['users' => User::all()]);
    }
    public function seeUser() {
        
        $email = request('email');
        // On recupere un seul utilisateur dont l'email correspond à $email
        $user = User::where('email',$email)->firstOrFail();
        $messages = Message::where('user_id', $user->id)->orderByDesc('created_at')->get();

        return view('/user',[
            'user' => $user,
            'messages' => $messages
        ]);

    }
}
