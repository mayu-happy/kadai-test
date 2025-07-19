<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'last_name'     => $this->faker->lastName(),
            'first_name'    => $this->faker->firstName(),
            'gender'        => $this->faker->numberBetween(1, 3),
            'email'         => $this->faker->unique()->safeEmail(),
            'first_number'  => '090',
            'middle_number' => $this->faker->numerify('####'),
            'last_number'   => $this->faker->numerify('####'),
            'address'       => $this->faker->address(),
            'building'      => $this->faker->secondaryAddress(),
            'category_id'   => $this->faker->numberBetween(1, 5),
            'detail'        => $this->faker->realText(100),
        ];
    }
}
