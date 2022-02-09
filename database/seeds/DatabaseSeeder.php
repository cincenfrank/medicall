<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(UserDetailSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(MessageSeeder::class);
    }
}
