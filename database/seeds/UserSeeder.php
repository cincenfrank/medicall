<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Provider\it_IT\Person as Faker;
use Faker\Generator as FakerGen;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, FakerGen $fakerGen)
    {
        for ($i = 0; $i < 500; $i++) {
            $newUser = new User();
            $newUser->first_name = $faker->firstName();
            $newUser->last_name = $faker->lastName();
            $newUser->email = $fakerGen->email();
            $newUser->password = '$2y$10$w5qBB2pes8s5RDpkr9jIZ.73N8ULg26kMeJJgW1UFLetDc7CKjFFq';
            $newUser->save();
            // Password : prova1234
        }
    }
}
