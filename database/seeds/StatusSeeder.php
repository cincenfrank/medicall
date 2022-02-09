<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'sent','received'
        ];
        foreach ($statuses as $status) {
            $newStatus = new Status();
            $newStatus->name = $status;
            $newStatus->save();
        }
    }
}
