<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content',
    'patient_name',
    'patient_email',
    'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
