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
    public function run(Faker $faker, FakerPhone $fakerPhone)
    {
        $filePath = storage_path('/app/public/img');
        $users = User::all();
        foreach ($users as $user) {
            $userDetail = new UserDetail();
            $userDetail->bio = $faker->text(200);
            $userDetail->img_path = 'img/' . $faker->image($filePath, 1945, 2153, null, false);
            $userDetail->phone = $fakerPhone->phoneNumber();
            $userDetail->available = true;
            $userDetail->user_id = $user['id'];
            $userDetail->save();
        }
    }
}
