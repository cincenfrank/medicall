<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Date;

class ReviewController extends Controller
{
    public function getReviewData()
    {
        // return Review::where('rating', '=', '5')->with('user')->with('user.subscriptions')->whereHas('user', function ($query) {
        //     $query->where('id', '>', '0');
        // })->whereHas('user.subscriptions', function ($querySec) {
        //     $querySec->where('expiration_date', '>', Date::now());
        // })->limit(20)->get();
        return User::with(['reviews' => function ($query) {
            $query->where('rating', '=', '5');
        }, 'subscriptions' => function ($query) {
            $query->where('expiration_date', '>', Date::now());
        }])->limit(20)->get();
        // ->whereHas('subscriptions', function ($queryTwo) {
        //     $queryTwo->where('expiration_date', '>', Date::now());
        // })
    }
}
