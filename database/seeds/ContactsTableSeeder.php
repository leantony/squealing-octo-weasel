<?php

use App\Contact;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
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
            Contact::create(
                [
                    'owner_id' => $faker->numberBetween(1, 19),
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->email,
                    'address' => $faker->address,
                    'twitter' => $faker->userName,
                ]
            );
        }
    }
}
