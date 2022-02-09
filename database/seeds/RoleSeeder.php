<?php

use App\Role;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'patient',
            'doctor'
        ];
        foreach ($roles as $role){
            $newRole = new Role();
            $newRole->name = $role;
            $newRole->save();
        }
    }
}
