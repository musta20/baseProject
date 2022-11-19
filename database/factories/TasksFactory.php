<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,5),
            'isread' => rand(0,1),
            'isdone' => 1,
            'boss_id' =>1,
            
            'des' => $this->faker->paragraph(),
            'title' => $this->faker->title(),

            'start' => $this->faker->dateTimeInInterval('-1 week', '+1 days'),

            'end' =>  $this->faker->dateTimeInInterval('-1 week', '+1 days'),

            'created_at' => $this->faker->dateTimeInInterval('-1 week', '+3 days'),

        ];
    }
}
