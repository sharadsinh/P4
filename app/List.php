<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    public function item() {
        #List has many items
        #Define one-to-many relationship
        return $this->hasMany('\App\Item');
    }
}
