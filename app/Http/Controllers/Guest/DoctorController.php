<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function show($id) {
        // $userDetail = User::all();
        $services = Service::all();
        // dump($userDetail);
        return view('pages.guest.showDoctor',[
            'user' => User::find($id),
            // 'userDetail' => $userDetail,
            'services'=>$services
        ]);
    }
}
