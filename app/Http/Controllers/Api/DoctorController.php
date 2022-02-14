<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DoctorController extends Controller
{
    public function sponsored(Request $request)
    {
        $sponsoredDoctors = User::with('subscriptions')->whereHas('subscriptions', function($param) {
            $param->where('expiration_date', '>', Date::now());
        })->get();
        return response()->json($sponsoredDoctors);
    }
}
