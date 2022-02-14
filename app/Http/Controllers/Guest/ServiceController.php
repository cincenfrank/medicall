<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($id)
    {
        $services = Service::findOrFail($id);
       //dump($services);

        return view('pages.guest.service', ['services' => $services]);
    }
}
