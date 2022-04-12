<?php

namespace App\Http\Controllers;

use App\user;

class FollowController extends Controller
{
    public function new () {
        // L'utilisateur qui veut suivre l'autre c'est l'utilisateur connecté
        $follower = auth()->user();
        // L'utilisateur dont on veut suivre ou l'utilisateur à qui on veut s'abonner
        $follow = User::where('email', strtolower(request('email')))->firstOrFail();
        return "Vous suiver ".request('email');
    }
}
