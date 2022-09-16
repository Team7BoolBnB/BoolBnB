<?php

use App\View;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

/**funziona ma bisogna stare attenti che l'accomodation id sia valido */
        for ($i = 84; $i < 89; $i++) {
            $view = new View();
            $view->accommodation_id=$i+1;
            $view->ipAddress=$faker->ipv4();
            $view->save();
        }
    }
}
