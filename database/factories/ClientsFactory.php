<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'des' => $this->faker->paragraph(),
            'rate' => rand(1, 5),
            'status' => rand(1, 2),
            'israted' => rand(1, 2),
            'token' => rand(1, 2),

        ];

    }
}
