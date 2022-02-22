<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class EditDoctorController extends Controller
{
    public function edit()
    {
        // assegno una variable con lo user che ha l´id uguale all´utente loggato 
        $user = User::where("id", "=", Auth::id())->with("userDetail")->with('services')->first();
        // $user = User::where("id", "=", '3')->with("userDetail")->first();
        $services = Service::all();

        return view('pages.dashboard.edit_doctor', [
            'user' => $user,
            'services' => $services
        ]);
    }

    public function update(Request $request)
    {
        // assegno una variable con lo user che ha l´id uguale all´utente loggato 
        $user = User::where("id", "=", Auth::id())->with("userDetail")->with('services')->first();
        // fatto una variabile che contiene tutti i parametri ricevuti nella request
        $data = $request->all();

        // se lo user ha cambiato nome devo modificare lo slug
        if ($user->first_name !== $data['first_name'] || $user->last_name !== $data['last_name']) {
            $data['slug'] = RegisterController::generateUserSlug($data['first_name'], $data['last_name']);
        }

        // validation tipologia file cv e img

        $oldImg = $user->userDetail->img_path;
        $oldCv = $user->userDetail->cv_path;

        //condizione che funziona alla stessa maniera
        // if($oldImg && array_key_exists('img_path' , $data)){
        //  Storage::delete($oldImg);
        // }

        //Caricamento img

        if ($oldImg && $request->file('img_path')) {
            Storage::delete($oldImg);
        };
        if (array_key_exists('img_path', $data)) {
            $img_path = Storage::put('img', $data['img_path']);
            $data['img_path'] = $img_path;
        }
        //FINE Caricamento img

        //Caricamento CV PATH
        if ($oldCv && $request->file('cv_path')) {
            Storage::delete($oldCv);
        };

        if (array_key_exists('cv_path', $data)) {
            $cv_path = Storage::put('CV', $data['cv_path']);
            $data['cv_path'] = $cv_path;
        }
        //FINE Caricamento CV PATH


        //Symlink
        //Salviamo il file che ci viene passato con la chiamata all'interno della cartella cv
        //modifichiamo il contenuto della chiave cv path del data inserendo il percorso dell'file salvato

        // se la variabile data contiene una chiave dal nome available, allora il valore dell´available deve essere false, altrimenti deve essere true
        if (array_key_exists("available", $data)) {
            $data["available"] = false;
        } else {
            $data["available"] = true;
        }

        // aggiorniamo lo user passando i parametri ricevuti nella request
        $user->update($data);

        // aggiorniamo lo user detail passando i parametri ricevuti nella request
        $user->userDetail->update($data);
        // dd($request->all());
        return Redirect::back();
    }

    public function createDoctorService(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $user = User::where("id", "=", Auth::id())->first();
        $user->services()->detach($data['name']);
        // quando aggiungiamo un dato su una tabella ponte come secondo argomento del attach dobbiamo specificare campo e contenuto che andrà inserito.
        $user->services()->attach($data['name'], ['price' => $data['price']]);
        return Redirect::back();
    }

    public function deleteDoctorService(Request $request)
    {
        // dd($request->all());
        $user = User::where("id", "=", Auth::id())->first();
        $user->services()->detach($request->serviceId);
        return Redirect::back();
    }
}
