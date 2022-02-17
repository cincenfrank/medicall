<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        // gets the messages for one doctor and groups them by day
        $messagesCountGroupedByDate = DB::select("SELECT DATE_FORMAT(created_at, '%d/%m/%Y') as `date`, COUNT(id) as `count` FROM `messages` WHERE user_id = 1 GROUP BY DATE_FORMAT(created_at, '%d/%m/%Y');");

        // gets the reviews for one doctor and groups them by day
        $reviewsCountGroupedByDate = DB::select("SELECT DATE_FORMAT(created_at, '%d/%m/%Y') as `date`, COUNT(id) as `count` FROM `reviews` WHERE user_id = 1 GROUP BY DATE_FORMAT(created_at, '%d/%m/%Y');");

        // calculate the vote avg for the reviews for the doctor
        $voteAvg = Review::avg('rating');

        // gets the active subscription for the doctor
        $activeSubscription = User::where('id', '=', '39')->with('subscriptions')->whereHas('subscriptions', function($param) {
            $param->where('expiration_date', '>', Date::now());
        })->get()->toArray();

        $rawChartsData = [
            'messages_time' => $messagesCountGroupedByDate,
            'reviews_time' => $reviewsCountGroupedByDate,
            'vote_avg' => $voteAvg,
            'active_subscription' => $activeSubscription
        ];
        return view('pages.dashboard.dashboard', compact('rawChartsData'));
    }
}
