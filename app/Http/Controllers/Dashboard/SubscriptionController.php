<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index() {
        $subscriptions = Subscription::all();
        return view('pages.dashboard.subscriptions',compact('subscriptions'));
    }
}
