<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ["Allergologia","Anatomia Patologica","Andrologia","Angiologia Medica","Cardiochirurgia","Cardiologia","Cardiologia pediatrica","Chirurgia Generale","Chirurgia Maxillo-facciale","Chirurgia Pediatrica","Chirurgia Plastica","Chirurgia Proctologica e Proctologia","Chirurgia Toracica","Chirurgia Vascolare","Dermatologia e Venereologia","Diabetologia","Dietologia","Ecografia e Doppler","Ematologia","Endocrinologia","Fisiatria","Fisioterapia","Gastroenterologia","Genetica Medica","Geriatria e Gerontologia","Ginecologia e Ostetricia","Immunologia","Infermieristica","Infettivologia e Malattie Infettive","Medicina del Dolore","Medicina dello Sport","Medicina Estetica","Medicina Interna","Medicina Legale","Medicina Nucleare","Nefrologia","Neurochirurgia","Neurofisiopatologia","Neurologia","Neuropsichiatria Infantile","Oculistica","Odontoiatria","Omeopatia e Agopuntura","Oncologia","Ortopedia e Traumatologia","Otorinolaringoiatria","Pediatria","Pneumologia e Malattie Respiratorie","Psichiatria","Psicologia","Radiologia Interventistica","Radiologia TAC e Risonanza","Reumatologia","Senologia","Urologia"];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            // $newCategory->img_path = $faker->imageUrl(640, 480, 'animals', true);
            $newCategory->description = $faker->text(300);
            $newCategory->save();
        }
    }
}
