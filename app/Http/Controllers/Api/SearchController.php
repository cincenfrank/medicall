<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // TODO add comments
    public function getFilterList(Request $request)
    {

        $services = Service::select('id', 'slug', 'name', DB::raw('"service" as "type"'))->get()->toArray();
        $doctors = User::select('id', 'slug', DB::raw('CONCAT(first_name , " " , last_name)  as "name"'), DB::raw('"doctor" as "type"'))->whereHas('userDetail', function ($query) {
            $query->where('available', '=', 1);
        })->get()->toArray();
        // $toReturn = ["services" => $services, "doctors" => $doctors];
        // return json_encode($toReturn);
        return json_encode(array_merge($services, $doctors));
    }

    public function getFilteredServices(Request $request)
    {
        $queryParamsSearchText = $request->query('text');
        $queryParamsServiceId = $request->query('service');
        if ($queryParamsSearchText) {
            return Service::select('id', 'slug', 'name', 'img_path')->where('name', 'LIKE', "%" . $queryParamsSearchText . "%")->get()->toArray();
        } else if ($queryParamsServiceId) {
            return Service::select('id', 'slug', 'name', 'img_path')->where('id', '=', $queryParamsServiceId)->get()->toArray();
        } else {
            return Service::select('id', 'slug', 'name', 'img_path')->get()->toArray();
        }
    }
    public function getFilteredDoctors(Request $request)
    {
        $queryParamsSearchText = $request->query('text');
        $queryParamsUserId = $request->query('userId');
        if ($queryParamsSearchText) {
            return User::select('id', 'slug', 'first_name', 'last_name',)->with('userDetail')->where('first_name', 'LIKE', "%" . $queryParamsSearchText . "%")->orWhere('last_name', 'LIKE', "%" . $queryParamsSearchText . "%")->paginate(20);
        } else if ($queryParamsUserId) {
            return User::select('id', 'slug', 'first_name', 'last_name')->with('userDetail')->where('id', '=', $queryParamsUserId)->paginate(20);
        } else {
            return User::select('id', 'slug', 'first_name', 'last_name')->with('userDetail')->paginate(20);
        }
    }
    public function getDoctorById($id)
    {
        return User::select('id', 'slug', 'first_name', 'last_name')->where('id', '=', $id)->with('services:id,name,img_path')->paginate(20);
    }
    public function getServiceById($id)
    {
        $services = Service::select('id', 'slug', 'name', 'img_path')->where('id', '=', $id)->get();
        $users = User::select('id', 'slug', 'first_name', 'last_name')->with('userDetail')->whereHas('services', function ($query) use ($id) {
            $query->where('services.id', '=', $id);
        })->paginate(20);
        $services[0]->users = $users;
        //dd(json_encode($services));
        // $doctors = User::select('id', 'first_name', 'last_name')->where('id', '=', $id)->with('users:id')->paginate(20);
        return $services;
    }
}
