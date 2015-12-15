<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function items() {
        #Store has many items
        #Define one-to-many relationship
        return $this->hasMany('\App\Item');
    }

    public function users() {
        #Store has many items
        #Define one-to-many relationship
        return $this->belongsToMany('\App\User')->withTimestamps();
    }
}
