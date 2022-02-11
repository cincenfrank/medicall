<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditDoctorController extends Controller
{
    public function edit() {
        return view('pages.dashboard.edit_doctor');
    }
}
