<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Contact;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contact::truncate();

        \App\Models\Contact::factory()->count(35)->create();

        $faker = Faker::create('ja_JP');

        // Contact::create([
        //     'last_name'     => $faker->lastName,
        //     'first_name'    => $faker->firstName,
        //     'email'         => $faker->unique()->safeEmail,
        //     'first_number'  => '090',
        //     'middle_number' => $faker->numerify('####'),
        //     'last_number'   => $faker->numerify('####'),
        //     'category_id'   => $faker->numberBetween(1, 5),
        //     'detail'        => $faker->realText(30),
        //     'gender'        => $faker->numberBetween(1, 3),
        //     'address'       => $faker->address,
        // ]);
    }
}
