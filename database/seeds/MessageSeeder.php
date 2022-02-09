<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Recuperiamo tutti gli user che sono anche dottori
        $doctors = User::whereHas('roles',function($query){
            return $query->where('roles.id','=',2);
        })->get();

        //Loop per ogni dottore
        foreach ($doctors as $doctor) {
            // dd($doctor['id']);
            $invalidPatientId = [$doctor['id']]; //array degli utenti che non possono essere pazienti
            $conversantionsNumber = $faker->numberBetween(0,10);// numero casuale di conversazioni

            // dump('dottore' . $doctor['id']. '---', 'conversazioni' . $conversantionsNumber);
            for ($i=0; $i < $conversantionsNumber; $i++) { //loop x messaggi
                // dump('---ciclo numero' . $i);
                $messagesNumber = $faker->numberBetween(1,20); // numero casuale di messaggi
                
                $randomPatient = User::all()->random(1)->first(); // recuperiamo un utente a caso dal db
                // dd($randomPatient['id']);
                $patientId = $randomPatient['id']; // otteniamo l'id del paziente

                while(in_array($patientId, $invalidPatientId)){ // finchè l'id del paziente  è presente nell'array degli utenti invalidPatientId
                    $randomPatient = User::all()->random(1)->first();
                    $patientId = $randomPatient['id'];
                }
                $invalidPatientId[] = $patientId; // pushiamo il patientId nell'invalidPatientId in modo che al prossimo ciclo non possa essere scelto lo stesso paziente

                for ($j=0; $j < $messagesNumber ; $j++) { //ciclo per ogni singolo messaggio

                    $newMessage = new Message();
                    $newMessage->doctor_id = $doctor['id'];
                    $newMessage->content = $faker->sentence();
                    $newMessage->patient_id = $patientId;
                    if($i===0){ // primo messaggio (paziente scrive per primo in questa logica)
                        $newMessage->status_id = 2;
                    }else{
                        $isReceivedByDoctor = $faker->boolean();
                        $newMessage->status_id = $isReceivedByDoctor ? 2 : 1;
                    }
                    $newMessage->save();
                }
            }
        }

        // dd($doctors);
    }
}
