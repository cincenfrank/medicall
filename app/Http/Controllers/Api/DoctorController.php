<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function fetchReviews($id){
        $user= User::findOrFail($id);
        $reviewsPerDottore = Review::where('user_id',$user->id)->get();
        return response()->json($reviewsPerDottore);
    }
}
