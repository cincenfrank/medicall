<?php

use App\User;
use App\UserDetail;
use Faker\Core\Uuid;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Provider\it_IT\PhoneNumber as FakerPhone;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, FakerPhone $fakerPhone)
    {
        // percorso di salvataggio delle immagini profilo utenti
        $filePath = storage_path('/app/public/img');
        $users = User::all();

        foreach ($users as $user) {
            // endpoint per immagini random 
            $fakerUrl = "https://i.pravatar.cc/1000";
            // genero un nome casuale per il file immagine
            $imageName = $faker->uuid();
            $imgPath = $filePath . "/" . $imageName . ".jpg";
            // si copia un immagine dall'endpoint all'interno del percorso appena definito
            copy($fakerUrl, $imgPath);
            $userDetail = new UserDetail();
            $userDetail->bio = $faker->text(2000);
            $userDetail->img_path = "img/" . $imageName . ".jpg";
            $userDetail->phone = $fakerPhone->phoneNumber();
            $userDetail->available = true;
            $userDetail->user_id = $user['id'];
            $userDetail->save();
        }
    }
}
