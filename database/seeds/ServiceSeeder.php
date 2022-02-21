<?php

use App\Service;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ServiceSeeder extends Seeder
{
    protected function randomCustomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 4; $i++) {
            $randstring = $randstring . $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $services = ["Allergologia", "Anatomia Patologica", "Andrologia", "Angiologia Medica", "Cardiochirurgia", "Cardiologia", "Cardiologia pediatrica", "Chirurgia Generale", "Chirurgia Maxillo-facciale", "Chirurgia Pediatrica", "Chirurgia Plastica", "Chirurgia Proctologica e Proctologia", "Chirurgia Toracica", "Chirurgia Vascolare", "Dermatologia e Venereologia", "Diabetologia", "Dietologia", "Ecografia e Doppler", "Ematologia", "Endocrinologia", "Fisiatria", "Fisioterapia", "Gastroenterologia", "Genetica Medica", "Geriatria e Gerontologia", "Ginecologia e Ostetricia", "Immunologia", "Infermieristica", "Infettivologia e Malattie Infettive", "Medicina del Dolore", "Medicina dello Sport", "Medicina Estetica", "Medicina Interna", "Medicina Legale", "Medicina Nucleare", "Nefrologia", "Neurochirurgia", "Neurofisiopatologia", "Neurologia", "Neuropsichiatria Infantile", "Oculistica", "Odontoiatria", "Omeopatia e Agopuntura", "Oncologia", "Ortopedia e Traumatologia", "Otorinolaringoiatria", "Pediatria", "Pneumologia e Malattie Respiratorie", "Psichiatria", "Psicologia", "Radiologia Interventistica", "Radiologia TAC e Risonanza", "Reumatologia", "Senologia", "Urologia"];
        $id = 1;
        foreach ($services as $service) {
            $slug = str_replace(' ', '-', strtolower($service));
            $isSlugAlreadyPresent = Service::where('slug', '=', $slug)->count() > 0;
            while ($isSlugAlreadyPresent) {
                $slug = str_replace(' ', '-', strtolower($service)) . '-' . $this->randomCustomString();
                $isSlugAlreadyPresent = Service::where('slug', '=', $slug)->count() > 0;
            }
            $newService = new Service();
            $newService->name = $service;
            $newService->description = $faker->text(200);
            $newService->slug = $slug;
            $newService->img_path = 'img/services/' . $id . '.jpg';
            $newService->save();
            $id++;
        }
    }
}
