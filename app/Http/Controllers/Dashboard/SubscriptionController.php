<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        // $userHasActiveSubscription = User::where('id', '=', Auth::id())->with('subscriptions')->whereHas('subscriptions', function($param) {
        //     $param->where('expiration_date', '>', Date::now());
        // })->count() > 0;
        $userWithSubscription = User::where('id', '=', Auth::id())->with('subscriptions')->whereHas('subscriptions', function($param) {
            $param->where('expiration_date', '>', Date::now());
        })->get()->first();
        
       // dd($userWithSubscription);
        return view('pages.dashboard.subscriptions', [
            "subscriptions" => $subscriptions,
            "userInfo" => $userWithSubscription,
            // "hasPremium" => $userHasActiveSubscription
        ]);
    }

    public function make(Request $request)
    {
        $price = $request->price;
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $status = \Braintree\Transaction::sale([
            'amount' => $price,
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true],
        ]);


        if ($status->success) {
            $currentUser = User::where('id', '=', Auth::id())->get()->first();
            $typeOfSubscription = 0;
            $expirationDate = Carbon::now();
            switch ($price) {
                case 2.99:
                    $typeOfSubscription = 1;
                    $expirationDate = Carbon::now()->addDays(1);
                    break;
                case 4.99:
                    $typeOfSubscription = 2;
                    $expirationDate = Carbon::now()->addDays(3);
                    break;
                case 9.99:
                    $typeOfSubscription = 3;
                    $expirationDate = Carbon::now()->addDays(6);
                    break;
            }

            $syncData = [$typeOfSubscription => ["expiration_date" => $expirationDate]];
                
            $currentUser->subscriptions()->sync($syncData);
        }
        
        return response()->json($status);
    }
}
