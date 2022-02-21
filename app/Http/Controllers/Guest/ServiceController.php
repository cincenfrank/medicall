<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Date;

class ServiceController extends Controller
{
    public function index($id)
    {
        $doctorList = User::with('userDetail')->with('subscriptions')->whereHas('subscriptions', function ($param) {
            $param->where('expiration_date', '>', Date::now());
        })->with('services')->whereHas('services', function ($param) use ($id) {
            $param->where('service_id', '=', $id);
        })->get()->toArray();

        return view('pages.guest.service', compact("doctorList"));
    }
}
