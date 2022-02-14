<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    public function getReviewData()
    {
        return Review::where('rating', '=', '5')->limit(20)->get();
    }
}
