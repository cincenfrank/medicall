<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;


class ServiceController extends Controller
{
    public function getServiceData($id)
    {
        return Service::select("name", "description")->where("id", "=", $id)->first();
    }

    //xxx
    public function serviceDoctorsData($id)
    {
        return User::with("service")->where("id", "=", $id)->get();
    }
}
