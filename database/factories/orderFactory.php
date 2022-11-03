<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class orderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'empy_id' => rand(2,20),
            'phone' =>  rand(100000,1000000),
            'des' => $this->faker->paragraph(),
            'title' => $this->faker->title(),
            'name' => $this->faker->name(),
            'receipt' => rand(1,4),
            'cash' => rand(1,4),
            'ip' => rand(1,4),
            'count' => rand(1,4),
            'time' => now(),
            'approve_time' => "none",
            'adress' => $this->faker->address(),
            'files' => rand(1,4),
            'payed' => rand(1,4),
            'status' => 2,
            'code' => rand(4000,5000),
            's_id' => rand(1,4),
        ];
    }




//$this->faker->random_int(),

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
