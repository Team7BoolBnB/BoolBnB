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
            $user->firstName = $faker->firstName();
            $user->lastName = $faker->lastName();
            $user->email = $faker->email();
            $user->dateOfBirth = $faker->dateTimeBetween("-80 year","-18year");
            $user->password = $faker->regexify("^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,15}$");

            $user->save();
        }
    }
}
