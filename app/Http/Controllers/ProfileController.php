<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        // Authorization: CUrrent Users will not be able to Edit other Users Profile (unable to enter the Edit View)
        $this->authorize('update', $user->profile);
        return view('profiles/edit', compact('user'));
    }

    // Update after Editing Profile
    public function update(User $user) {
        // Preemptive Authorization
        $this->authorize('update', $user->profile);

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

        // If there are new Profile Image to be set
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            // Fixing breaking Execution if there is no Image Request (User not including any images in their updates)
            // - Default to Empty if not set
            $images = ['image' => $imagePath];
        }
        // Merging
        $data = array_merge($data, $images ?? []);
        // Update all Data Fields
        //  - Only Grabbing the Authnticated User to avoid Potential Hacks
        auth()->user()->profile->update(
            $data
        );

        // Redirect back to the Changed profile
        return redirect("/profile/{$user->id}");
    }
}

// Making Following and Followers Functionalities with Vue.js Components and Functions
