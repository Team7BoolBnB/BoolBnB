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
        
        for ($i = 0; $i < 100; $i++) {
            
            $accomodation = new Accommodation();
            
            $accomodation->user_id=$i+1;
            $accomodation->address = $faker->address();
            $accomodation->longitude = $faker->randomNumber();
            $accomodation->latitude = $faker->randomNumber();
            $accomodation->slug = $faker->name();
            $accomodation->title = $faker->name();
            $accomodation->description=$faker->nema();
            $accomodation->rooms = $faker->numberBetween(1,4);
            $accomodation->beds = $faker->numberBetween(1,4);
            $accomodation->bathrooms = $faker->numberBetween(1,3);
            $accomodation->mt_square = $faker->numberBetween(1,3);
            $accomodation->image = $faker->numberBetween(1,3);
             $accomodation->available = $faker->numberBetween(1,3);






            $accomodation->save();
        }
    }
}
