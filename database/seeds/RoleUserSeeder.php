<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        foreach ($users as $user) {
            $roles = [1];
            $isDoctor = $faker->boolean();
            if ($isDoctor){
                $roles[] = 2;
            }
            $user->roles()->sync($roles);
        }
    }
}
