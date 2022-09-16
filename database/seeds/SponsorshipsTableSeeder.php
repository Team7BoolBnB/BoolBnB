<?php

use App\Sponsorship;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = ["Silver", "Gold", "Platinum"];
        $period=[24,72,144];
        $price = [2.99,5.99,9.99];


        for ($i = 0; $i < count($type); $i++) {
            $sponsorship = new Sponsorship();
            $sponsorship->name = $type[$i];
            $sponsorship->period = $period[$i];
            $sponsorship->price = $price[$i];

            $sponsorship->save();
        }
    }
}
