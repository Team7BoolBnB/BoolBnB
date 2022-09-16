<?php
use Faker\Generator as Faker;
use App\Accommodation;
use Illuminate\Database\Seeder;

class AccommodationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $typology=["House","Hotel","BnB","Appartment","Guest_House"];
        for ($i = 0; $i < 10; $i++) {
            $randomNumber=rand(0,4);
            $accomodation = new Accommodation();
            
            $accomodation->user_id=$i+1;
            $accomodation->typology =$typology[$randomNumber];
            $accomodation->counter = $faker->numberBetween(0,1000000);
            $accomodation->indirizzo = $faker->address();
            $accomodation->longitudine = $faker->randomNumber();
            $accomodation->latitudine = $faker->randomNumber();
            $accomodation->titolo = $faker->name();
            $accomodation->stanze = $faker->numberBetween(1,4);
            $accomodation->letti = $faker->numberBetween(1,4);
            $accomodation->bagni = $faker->numberBetween(1,3);




            $accomodation->save();
        }
    }
}
