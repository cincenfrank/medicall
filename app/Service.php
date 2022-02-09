<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
