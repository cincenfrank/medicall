<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getJumboService($id)
    {
        return Service::select("name", "description")->where("id", "=", $id)->first();
    }
}
