<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function reviews() {
        return $this->hasMany(Review::class); 
    }
}
