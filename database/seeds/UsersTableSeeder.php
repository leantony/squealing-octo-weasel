<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range( 1, 20 ) as $index) {
            User::create(
                [
                    'name'   => $faker->firstName,
                    'email'        => $faker->email,
                    'password'     => bcrypt('123456789'),
                ]
            );
        }
    }
}
