<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    {
        return view(
            'profiles/index',
            compact('user')
        );
    }

    // Open Profile Edit View
    public function edit(User $user) {
        return view('profiles/edit', compact('user'));
    }

    // Update after Editing Profile
    public function update(User $user) {
        // Requesting the Data Fields Sent through Input Form
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => 'url',
            'image' => ''
        ]);
        // // Data Dump
        // dd($data);

        // Update all User Profile Fields that Changed with the Data Request
        // $user->profile->update($data);

        // Only Grabbing the Authnticated User to avoid Potential Hacks
        auth()->user()->profile->update($data);
        // Redirect back to the Changed profile
        return redirect("/profile/{$user->id}");
    }
}
