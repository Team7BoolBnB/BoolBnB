<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->firstName = $faker->address();
            $user->lastName = $faker->address();
            $user->email = $faker->address();
            $user->dateOfBirth = $faker->address();
            $user->password = $faker->address();

            



        }
    }
}
