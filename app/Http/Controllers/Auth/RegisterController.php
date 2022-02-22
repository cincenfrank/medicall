<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserDetail;
use CustomUtilities;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    static public function generateUserSlug($firstName, $lastName) {
        $firstNameParsed = str_replace(' ', '-', $firstName);
        $lastNameParsed = str_replace(' ', '-', $lastName);
        //creo lo slug concatenando firstName e lastName in minuscolo
        $slug = strtolower($firstNameParsed . "-" . $lastNameParsed);
        //controllo se esiste o meno nel DB
        $isSlugAlreadyPresent = User::where('slug', '=', $slug)->count() > 0;
        //se esiste faccio un ciclo 
        while ($isSlugAlreadyPresent) {
            //aggiungo alla stringa 4 lettere casuali con una funzione esterna
            $slug = strtolower($firstNameParsed . "-" . $lastNameParsed) . '-' . CustomUtilities::randomCustomString();
            $isSlugAlreadyPresent = User::where('slug', '=', $slug)->count() > 0;
        }

        return $slug;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $slug = RegisterController::generateUserSlug($data['first_name'], $data['last_name']);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'slug' => $slug,
            'email' => $data['email'],
            'password' => Hash::make(
                $data['password'],
            ),
        ]);
        $userDetail = new UserDetail();
        $userDetail->user_id = $user->id;

        $user->userDetail()->save($userDetail);

        return $user;
    }
}
