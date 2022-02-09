<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Service;

class Category extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
