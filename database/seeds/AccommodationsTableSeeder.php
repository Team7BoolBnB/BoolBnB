<?php
use Faker\Generator as Faker ;
use App\Accommodation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            
            
            $accomodation->user_id=$faker->numberBetween(10,80);
            $accomodation->typology_id=$faker->numberBetween(1,4);

            $accomodation->address = $faker->address();
            $accomodation->longitude = $faker->randomFloat(4, 11, 13.7);
            $accomodation->latitude = $faker->randomFloat(4, 35.5, 45.5);
            $accomodation->title = $faker->sentence(5);
            $slug = Str::slug($accomodation->title, '-');
            $accomodation->slug = $slug;
            $accomodation->description=$faker->paragraph();
            $accomodation->rooms = $faker->numberBetween(1,10);
            $accomodation->beds = $faker->numberBetween(1,10);
            $accomodation->bathrooms = $faker->numberBetween(1,6);
            $accomodation->mt_square = $faker->numberBetween(50,500);
            $k=$i+450;
            $accomodation->image = "https://picsum.photos/id/". $k ."/1920/1080";
            $accomodation->available = $faker->boolean();






            $accomodation->save();
        }
    }
}
