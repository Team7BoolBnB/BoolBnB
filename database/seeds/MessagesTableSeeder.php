<?php

use App\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

            for ($k = 1; $k < 300; $k++) {
                $message = new Message();
                $message->accommodation_id = $faker->numberBetween(1,99);

                $firstName = $faker->firstName();
                $lastName = $faker->lastName();
                $message->name = $firstName . " " . $lastName;
                $message->email = $faker->email();
                $message->content = $faker->paragraph();

                $message->save();
            }
        
    }
}
