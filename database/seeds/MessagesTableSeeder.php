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
        for ($i = 84; $i < 89; $i++) {
            $message = new Message();
            $message->accommodation_id=$i+1;
            $firstName=$faker->firstName();
            $lastName=$faker->lastName();
            $message->name=$firstName . " " . $lastName;
            $message->email=$faker->email();
            $message->content=$faker->paragraph();

            $message->save();
        }
    }
}
