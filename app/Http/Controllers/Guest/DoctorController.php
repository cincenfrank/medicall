<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Review;
use App\Service;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function show($id) {
        $user = User::findOrFail($id);
        $services = Service::all();
        $reviews = Review::where('user_id',$user->id)->paginate(6);
        // dump($reviews);

        return view('pages.guest.showDoctor',[
            'user' => $user,
            'services'=>$services,
            'reviews' => $reviews,
        ]);
    }
}
