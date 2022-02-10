<?php

use App\Review;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $doctors = User::all();
        foreach ($doctors as $doctor) {
            $numberOfReviews = $faker->numberBetween(0, 200);
            for ($i = 0; $i < $numberOfReviews; $i++) {
                $newReview = new Review();
                $newReview->content = $faker->sentence(200);
                $newReview->title = $faker->sentence(3);
                $newReview->rating = $faker->numberBetween(1, 5);
                $newReview->user_id = $doctor["id"];
                $newReview->save();
            }
        }
    }
}
