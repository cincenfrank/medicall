<?php

use App\Service;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ServiceUserSeeder extends Seeder
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
            // generiamo un numero casuale di servizi da assegnare ad ogni dottore
            $numberOfServices = $faker->numberBetween(1, 4);
            // estraiamo un array di id "servizi casuali" di lunghezza pari al random generato prima
            $randomServicesArray = Service::pluck("id")->random($numberOfServices)->toArray();
            // generiamo un array di array vuoti di lunghezza pari al $numberOfServices 
            $priceData = array_fill(0, count($randomServicesArray), []);
            // loop per riempire gli array appena generati con prezzi casuali
            foreach ($priceData as $key => $singlePriceData) {
                // generiamo il prezzo casuale
                $singlePriceData["price"] = $faker->randomFloat(2, 80, 250);
                // assegnamo alla variabile $priceData il valore(oggetto) appena generato
                $priceData[$key] = $singlePriceData;
            }
            // uniamo il $randoServicesArray e il $priceData
            $syncData = array_combine($randomServicesArray, $priceData);
            // salviamo i dati con il sync
            $doctor->services()->sync($syncData);
        }
    }
}
