<?php

use App\User;
use App\UserDetail;
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
    public function run(Faker $faker , FakerPhone $fakerPhone)
    {
        $users = User::all();
        foreach ($users as $user) {
            $userDetail = new UserDetail();
            $userDetail->bio = $faker->text(200);
            $userDetail->phone = $fakerPhone->phoneNumber();
            $userDetail->user_id = $user['id'];
            $userDetail->save();
        }
    }
}
