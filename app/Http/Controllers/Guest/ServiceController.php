<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use CustomUtilities;
use Illuminate\Support\Facades\Date;

class ServiceController extends Controller
{
    static public function generateServiceSlug($serviceName) {
        $serviceNameParsed = str_replace(' ', '-', $serviceName);
        //creo lo slug concatenando firstName e lastName in minuscolo
        $slug = strtolower($serviceNameParsed);
        //controllo se esiste o meno nel DB
        $isSlugAlreadyPresent = Service::where('slug', '=', $slug)->count() > 0;
        //se esiste faccio un ciclo 
        while ($isSlugAlreadyPresent) {
            //aggiungo alla stringa 4 lettere casuali con una funzione esterna
            $slug = strtolower($serviceNameParsed) . '-' . CustomUtilities::randomCustomString();
            $isSlugAlreadyPresent = Service::where('slug', '=', $slug)->count() > 0;
        }

        return $slug;
    }

    public function index($slug)
    {
        $doctorList = User::with('userDetail')->with('subscriptions')->whereHas('subscriptions', function ($param) {
            $param->where('expiration_date', '>', Date::now());
        })->with('services')->whereHas('services', function ($param) use ($slug) {
            $param->where('slug', '=', $slug);
        })->get()->toArray();

        $service = Service::where('slug', '=', $slug)->firstOrFail();

        return view('pages.guest.service', [
            "service" => $service,
            "doctorList" => $doctorList
        ]);
    }
}
