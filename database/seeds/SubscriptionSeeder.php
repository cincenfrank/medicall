<?php

use App\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'name' => 'Basic',
                'price'=>'2.99',
                'duration_hours' => '24',
                'description' => 'Description basic'
            ],
            [
                'name' => 'Medium',
                'price'=>'4.99',
                'duration_hours' => '72',
                'description' => 'Description medium'
            ],
            [
                'name' => 'Gold',
                'price'=>'9.99',
                'duration_hours' => '144',
                'description' => 'Description gold'
            ],
        ];

        foreach ($subscriptions as $subcription) {
            $newSubscription = new Subscription();
            $newSubscription->name = $subcription['name'];
            $newSubscription->price = $subcription['price'];
            $newSubscription->duration_hours = $subcription['duration_hours'];
            $newSubscription->description = $subcription['description'];
            $newSubscription->save();
        }
    }
}
