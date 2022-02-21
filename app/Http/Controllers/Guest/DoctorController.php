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
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class DoctorController extends Controller
{

    public function addMessage(Request $request)
    {
        // dd($request);
        // $errorType = ['typeTest' => 'Message'];
        // $request->validate([
        // 'content' => 'required | max:500',
        // 'patient_name' => 'required| max:100',
        // 'patient_email' => 'required | max:100',
        // 'user_id' => 'required'
        // ]);
        $validator = FacadesValidator::make($request->all(), [
            'content' => 'required | max:500',
            'patient_name' => 'required| max:100',
            'patient_email' => 'required | max:100',
            'user_id' => 'required'
        ]);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('type', 'Message');
            return Redirect::back()->withErrors($validator);
        }

        $data = $request->all();
        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();
        return Redirect::back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     $validator = FacadesValidator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email','min:5' ,'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'title'=>['required','string','max:100'],
    //         'reviewer_name'=>['required','string','max:100'],
    //         'reviewer_email'=>['required','string','max:100'],
    //         'content'=>['required','string','max:1000'],
    //         'rating'=>['required'],
    //         'user_id' => ['required']
    //     ]);
    //     if($validator->fails()){
    //         return Redirect::back()->withErrors($validator,'errori')->withInput();
    //     }
    //     return 'Validazione fatta';
    // }

    public function addReview(Request $request)
    {
        // $errorType = ['typeTest' => 'Review'];
        $validator = FacadesValidator::make($request->all(), [
            'title' => 'required|string|max:100',
            'reviewer_name' => 'required|string|max:100|regex:/^([^0-9]*)$/',
            'reviewer_email' => 'required|string|max:100',
            'content' => 'required|string|max:1000',
            'rating' => 'required',
            'user_id' => 'required'
        ]);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('type', 'Review');
            return Redirect::back()->withErrors($validator);
        }
        // $request->validate([
        //     'title'=>'required|string|max:100',
        //     'reviewer_name'=>'required|string|max:100',
        //     'reviewer_email'=>'required|string|max:100',
        //     'content'=>'required|string|max:1000',
        //     'rating'=>'required',
        //     'user_id' => 'required',
        // ],$errorType);
        $data = $request->all();
        // $validazione = validator($data);
        $newReview = new Review();
        $newReview->fill($data);
        $newReview->save();
        $success = true;

        return Redirect::back()->with(compact('success'));
        // return view('pages.guest.show_doctor',[]);
    }

    public function show($id)
    {
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
        $allVotes = Review::where('user_id', $user->id)->pluck('rating')->toArray();
        $somma = 0;
        foreach ($allVotes as $voto) {
            $somma += $voto;
        };
        if (count($allVotes) > 0) {
            $media = round($somma / count($allVotes), 2);
        } else {
            $media = 0;
        }
        // dump(round($media));
        $reviews = Review::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('pages.guest.show_doctor', [
            'user' => $user,
            'reviews' => $reviews,
            'ratings' => $ratings,
            'media' => $media
        ]);
    }
}
