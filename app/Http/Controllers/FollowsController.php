<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class FollowsController extends Controller
{
    public function __construct() {
        // Setting up Authentication mechanic
        $this->middleware('auth');
    }
    // Return the Authnticated User while TOggling the Following Relationship between them and the Current User Profile
    public function store(User $user) {
        return auth()->user()->followings()->toggle($user->profile);
    }
}
