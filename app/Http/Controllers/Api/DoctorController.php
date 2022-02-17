<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DoctorController extends Controller
{
    public function getSponsoredDoctors(Request $request)
    {
        $sponsoredDoctors = User::with('subscriptions')->whereHas('subscriptions', function($param) {
            $param->where('expiration_date', '>', Date::now());
        })->get();
        return response()->json($sponsoredDoctors);

    public function fetchReviews($id){
        $user= User::findOrFail($id);
        $reviewsPerDottore = Review::where('user_id',$user->id)->get();
        return response()->json($reviewsPerDottore);
    }
}
