<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Date;

class ServiceController extends Controller
{
    public function getServiceData($slug)
    {
        return Service::select("name", 'slug', "description", "img_path")->where("slug", "=", $slug)->first();
    }

    public function serviceDoctorsData($slug)
    {
        return User::with('subscriptions')->whereHas('subscriptions', function ($param) {
            $param->where('expiration_date', '>', Date::now());
        })->with('services')->whereHas('services', function ($param) use ($slug) {
            $param->where('slug', '=', $slug);
        })->get();

        // return User::with('subscriptions')->with('services')->whereHas('services', function ($param) use ($id) {
        //     $param->where('service_id', '=', $id);
        // })->get()->sortByDesc("subscriptions.pivot.expiration_date");
    }
}
