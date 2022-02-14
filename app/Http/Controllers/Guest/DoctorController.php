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
        $newMessage->fill($data);
        $newMessage->save();
        return Redirect::back();
    }

    public function addReview(Request $request){
        $data = $request->all();
        $newReview = new Review();
        $newReview->fill($data);
        $newReview->save();

        return Redirect::back();

    }

    public function show( $id) {
        $ratings = [
            [
                'voto' => 1,
            ],
            [
                'voto' => 2,
            ],
            [
                'voto' => 3,
            ],
            [
                'voto' => 4,
            ],
            [
                'voto' => 5,
            ],
        ];
        $user = User::findOrFail($id);
        $allVotes = Review::where('user_id',$user->id)->pluck('rating')->toArray();
        $somma = 0;
        foreach ($allVotes as $voto) {
            $somma += $voto;
        };
        $media = round($somma / count($allVotes),2);
        // dump(round($media));
        $reviews = Review::where('user_id',$user->id)->paginate(6);

        return view('pages.guest.show_doctor',[
            'user' => $user,
            'reviews' => $reviews,
            'ratings' => $ratings,
            'media' => $media
        ]);
    }
}
