<?php

use App\Typology;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = ["House", "Guest-House", "Hotel", "Apartment"];
        $icon = ["fa-solid fa-house", "fa-solid fa-house-chimney-user", "fa-solid fa-hotel", "fa-solid fa-building"];


        for ($i = 0; $i < count($type); $i++) {
            $typology = new Typology();
            $typology->type = $type[$i];
            $typology->save();
        }
    }
}
