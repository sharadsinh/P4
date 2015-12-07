<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function list() {
        #Item belong to list
        #Define an inverse one-to-many relationship
        return $this->belongsTo('\App\Store');
    }
}
