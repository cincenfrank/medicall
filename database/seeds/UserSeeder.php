<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Provider\it_IT\Person as Faker;
use Faker\Generator as FakerGen;

class UserSeeder extends Seeder
{
    protected function randomCustomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 4; $i++) {
            $randstring = $randstring . $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, FakerGen $fakerGen)
    {

        for ($i = 0; $i < 100; $i++) {
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();

            $slug = strtolower($firstName . "-" . $lastName);
            $isSlugAlreadyPresent = User::where('slug', '=', $slug)->count() > 0;
            while ($isSlugAlreadyPresent) {
                $slug = strtolower($firstName . "-" . $lastName)  . '-' . $this->randomCustomString();
                $isSlugAlreadyPresent = User::where('slug', '=', $slug)->count() > 0;
            }
            $newUser = new User();
            $newUser->first_name = $firstName;
            $newUser->last_name = $lastName;
            $newUser->slug = $slug;
            $newUser->email = $fakerGen->email();
            $newUser->password = '$2y$10$w5qBB2pes8s5RDpkr9jIZ.73N8ULg26kMeJJgW1UFLetDc7CKjFFq';
            $newUser->save();
            // Password : prova1234
        }
    }
}
