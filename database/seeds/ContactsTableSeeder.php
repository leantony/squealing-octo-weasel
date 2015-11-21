<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        \App\Contact::create([
            'owner_id' => 1,
            'first_name' => 'leantony',
            'last_name' => 'anto',
            'email' => 'leantony@github.com',
            'address' => '12452210',
            'twitter' => 'leantony',

        ]);

        \App\Contact::create([
            'owner_id' => 1,
            'first_name' => 'antonychacha9',
            'last_name' => 'anto9',
            'email' => 'chachaantony@gmail.com',
            'address' => '124521',
            'twitter' => 'antonychacha',

        ]);

        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
