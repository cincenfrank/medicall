<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function rating() {
        return $this->belongsTo(Rating::class);
    }

    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
