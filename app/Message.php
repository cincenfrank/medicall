<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient() {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }
}
