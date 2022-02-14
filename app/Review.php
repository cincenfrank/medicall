<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    'title',
    'content',
    'rating',
    'reviewer_name',
    'reviewer_email',
    'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
