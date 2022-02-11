<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index($id) {
        // id dinamico
        return view('pages.guest.show_doctor');
    }
}
