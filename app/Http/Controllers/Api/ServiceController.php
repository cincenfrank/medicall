<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Date;

class ServiceController extends Controller
{
    public function getServiceData($id)
    {
        return Service::select("name", "description")->where("id", "=", $id)->first();
    }


    public function serviceDoctorsData($id)
    {
        return User::with('subscriptions')->whereHas('subscriptions', function ($param) {
            $param->where('expiration_date', '>', Date::now());
        })->with('services')->whereHas('services', function ($param) use ($id) {
            $param->where('service_id', '=', $id);
        })->get();

        // return User::with('subscriptions')->with('services')->whereHas('services', function ($param) use ($id) {
        //     $param->where('service_id', '=', $id);
        // })->get()->sortByDesc("subscriptions.pivot.expiration_date");
    }
}
