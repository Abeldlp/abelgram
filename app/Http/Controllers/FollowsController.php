<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Auth;


class FollowsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function store ($user) {
        $user = User::findOrFail($user);
        return Auth::user()->following()->toggle($user->profile);
    }
}
