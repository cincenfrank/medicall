<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use App\Service;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class DoctorController extends Controller
{
    public function addMessage(Request $request){
        // dd($request);
        $data = $request->all();
        // dd($data);
        $newMessage = new Message();
        $newMessage->content = $data['content'];
        $newMessage->patient_name = $data['patient_name'];
        $newMessage->patient_email = $data['patient_email'];
        $idUserFromRequest = $data['user_id'];
        $newMessage->user_id = $idUserFromRequest;
        $newMessage->save();
        // return redirect()->route('guest.doctors',[$idUserFromRequest]);
        return Redirect::back();


    }

    public function show( $id) {
        $user = User::findOrFail($id);
        $reviews = Review::where('user_id',$user->id)->paginate(6);

        return view('pages.guest.show_doctor',[
            'user' => $user,
            'reviews' => $reviews,
        ]);
    }
}
