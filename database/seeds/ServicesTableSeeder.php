<?php

use App\Service;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = ["Wi-fi", "Cucina", "Parcheggio gratuito nella proprietà", "Vasca da bagno","Vista sul mare","TV","Riscaldamento"];
        $icon = ["fa-solid fa-wifi", "fa-solid fa-kitchen-set", "fa-solid fa-car", "fa-solid fa-bath", "fa-solid fa-umbrella-beach","fa-solid fa-tv","fa-solid fa-temperature-arrow-up"];


        for ($i = 0; $i < count($type); $i++) {
            $service = new Service();
            $service->name = $type[$i];
            $service->icon = $icon[$i];
            $service->save();
        }
    }
}
