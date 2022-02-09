<?php

use App\Rating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = ['1','2','3','4','5'];
        foreach ($ratings as $rating) {
            $newRating = new Rating();
            $newRating->value = $rating;
            $newRating->save();
        }
    }
}
