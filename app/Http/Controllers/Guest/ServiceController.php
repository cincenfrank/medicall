<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return view('pages.guest.service');
    }
}
