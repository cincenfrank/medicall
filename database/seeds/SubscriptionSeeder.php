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
                'description' => 'Il nostro pacchetto BASIC ti permette di avere una marcia in più rispetto alla concorrenza. Aumenta la tua visibilità per 24h e amplia il tuo numero di pazienti.'
            ],
            [
                'name' => 'Medium',
                'price'=>'4.99',
                'duration_hours' => '72',
                'description' => 'Scegli il nostro pacchetto MEDIUM e con soli 2 €. in più rispetto al BASIC, sarai in primo piano per il triplo del tempo.'
            ],
            [
                'name' => 'Gold',
                'price'=>'9.99',
                'duration_hours' => '144',
                'description' => 'Il nostro pacchetto GOLD, ti permette di essere sempre in cima alle ricerche per 6 giorni, ad un prezzo imbattibile. Cosa aspetti ?'
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
