<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetail() {
        return $this->hasOne(UserDetail::class); 
    }

    public function receivedReviews() {
        return $this->hasMany(Review::class, 'doctor_id'); 
    }

    public function sentReviews() {
        return $this->hasMany(Review::class, 'user_id'); 
    }

    public function messagesAsPatient() {
        return $this->hasMany(User::class, 'patient_id');
    }

    public function messagesAsDoctor() {
        return $this->hasMany(User::class, 'doctor_id');
    }

    public function subcriptions() {
        return $this->belongsToMany(Subscription::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}
