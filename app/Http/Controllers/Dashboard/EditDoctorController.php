<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditDoctorController extends Controller
{
    public function edit() {
        // assegno una variable con lo user che ha l´id uguale all´utente loggato 
        $user=User::where("id", "=", Auth::id())->with("userDetail")->first();



        return view('pages.dashboard.edit_doctor', compact("user"));
    }

    public function update(Request $request){
        // assegno una variable con lo user che ha l´id uguale all´utente loggato 
        $user=User::where("id", "=", Auth::id())->with("userDetail")->first();
        // fatto una variabile che contiene tutti i parametri ricevuti nella request
        $data=$request->all();

        // se la variabile data contiene una chiave dal nome available, allora il valore dell´available deve essere false, altrimenti deve essere true
            if(array_key_exists("available", $data)){
                $data["available"] = false;
            }else{
                $data["available"] = true;
            }

        // aggiorniamo lo user passando i parametri ricevuti nella request
        $user->update($data);

        // aggiorniamo lo user detail passando i parametri ricevuti nella request
        $user->userDetail->update($data);
        dd($request->all());
    }
}
