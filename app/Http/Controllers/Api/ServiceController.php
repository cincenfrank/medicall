<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
    public function getServiceData($id)
    {
        return Service::select("name", "description")->where("id", "=", $id)->first();
    }
}
