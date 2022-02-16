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

    public function getSingleMessage($message_id, $doctor_id){
        $singleMessage= Message::with("user")->where("user_id", "=", $doctor_id)->where("id", "=", $message_id)->get();

        return $singleMessage;
    }

    
    
}
