<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class messageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from' => 1,
            'to' => rand(1,29),
            'isred' => rand(0,1),
            'title' => $this->faker->name(),
            'message' => $this->faker->paragraph(),
            
        ];
    }
}
