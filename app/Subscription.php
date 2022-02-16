<?php
//x
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function users() {
        return $this->belongsToMany(User::class)->withPivot('expiration_date');
    }
}
