<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use CustomUtilities;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    static public function generateServiceSlug($serviceName)
    {
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


        $doctorListNoSub = User::with('userDetail')->doesntHave('subscriptions')->with('services')->whereHas('services', function ($param) use ($slug) {
            $param->where('slug', '=', $slug);
        })->get()->toArray();


        $mergedDoctors = array_merge($doctorList, $doctorListNoSub);

        //$doctorList = DB::select("select * from `users` where exists (select * from `services` inner join `service_user` on `services`.`id` = `service_user`.`service_id` where `users`.`id` = `service_user`.`user_id` and `slug` = '" . $slug . "') and exists (select * from `subscriptions` inner join `subscription_user` on `subscriptions`.`id` = `subscription_user`.`subscription_id` where `users`.`id` = `subscription_user`.`user_id` order by `expiration_date` asc) union all select * from `users` where exists (select * from `services` inner join `service_user` on `services`.`id` = `service_user`.`service_id` where `users`.`id` = `service_user`.`user_id` and `slug` = 'allergologia') and not exists (select * from `subscriptions` inner join `subscription_user` on `subscriptions`.`id` = `subscription_user`.`subscription_id` where `users`.`id` = `subscription_user`.`user_id` order by `expiration_date` asc);");
        dd($mergedDoctors);

        $service = Service::where('slug', '=', $slug)->firstOrFail();

        return view('pages.guest.service', [
            "service" => $service,
            "mergedDoctors" => $mergedDoctors
            // "doctorList" => $doctorList,
            // "doctorListNoSub" => $doctorListNoSub
        ]);
    }
}
