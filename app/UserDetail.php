<?php
//x
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [

        "bio", "cv_path", "available", "phone", "img_path"

    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
