<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Provider\it_IT\Person as FakerPerson;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, FakerPerson $fakerPerson)
    {
        $doctors = User::all();
        foreach ($doctors as $doctor) {
            $numberOfMessages = $faker->numberBetween(0, 20);
            for ($i = 0; $i < $numberOfMessages; $i++) {
                $newMessage = new Message();
                $newMessage->content = $faker->sentence(200);
                $newMessage->patient_name = $fakerPerson->firstName() . " " . $fakerPerson->lastName();
                $newMessage->patient_email = $faker->email();
                $newMessage->user_id = $doctor["id"];
                $newMessage->created_at = $faker->dateTimeBetween("-1 week");
                $newMessage->save();
            }
        }
    }
}
