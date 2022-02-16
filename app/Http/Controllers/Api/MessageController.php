<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getDoctorMessages($id){
        $doctorMessages= Message::with("user")->where("user_id", "=", $id)->get();

        return $doctorMessages;
    }
    
    
}
