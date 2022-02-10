<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class SubscriptionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // prendiamo tutti i dottori
        $doctors = User::all();
        // loop sui dottori
        foreach ($doctors as $doctor) {

            $hasSubscription = $faker->boolean();
            if ($hasSubscription) {
                // generiamo un numero casuale di servizi da assegnare ad ogni dottore
                $typeOfSubscription = $faker->numberBetween(1, 3);
                $expirationDate = "";
                switch ($typeOfSubscription) {
                    case 1:
                        $expirationDate = $faker->dateTimeBetween("now", "+1 days");
                        break;
                    case 2:
                        $expirationDate = $faker->dateTimeBetween("now", "+3 days");
                        break;
                    case 3:
                        $expirationDate = $faker->dateTimeBetween("now", "+6 days");
                        break;
                }
                // estraiamo un array di id "servizi casuali" di lunghezza pari al random generato prima
                // $randomServicesArray = Service::pluck("id")->random($numberOfServices)->toArray();
                // generiamo un array di array vuoti di lunghezza pari al $numberOfServices 
                //$priceData = array_fill(0, count($randomServicesArray), []);
                // loop per riempire gli array appena generati con prezzi casuali
                //foreach ($priceData as $key => $singlePriceData) {
                // generiamo il prezzo casuale
                //$singlePriceData["price"] = $faker->randomFloat(2, 80, 250);
                // assegnamo alla variabile $priceData il valore(oggetto) appena generato
                //$priceData[$key] = $singlePriceData;
                //}
                // uniamo il $randoServicesArray e il $priceData
                // $syncData = array_combine($randomServicesArray, $priceData);
                $syncData = [$typeOfSubscription => ["expiration_date" => $expirationDate]];
               
                $doctor->subscriptions()->sync($syncData);
               
            }
        }
    }
}
