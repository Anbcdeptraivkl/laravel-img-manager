<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Disabling Mass Assignment Fillable Protections
    protected $guarded = [];

    // Setting up One-to-one Relationship
    public function user() {
        return $this->belongsTo(User::class);
    }
}
