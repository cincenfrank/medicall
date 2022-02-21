<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('pages.dashboard.subscriptions', compact('subscriptions'));
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
        return response()->json($status);
    }
}
