<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Disabling Mass Assignment Fillable Protections
    protected $guarded = [];

    // Loading Images Path (with Default Image if newly created)
    public function profileImage() {
        $path = ($this->image) ? "{$this->image}" : "profile/no-img.jpg";
        return "/storage/" . $path;
    }

    // Setting up One-to-one Relationship
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Many Followers (User Model)
    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
