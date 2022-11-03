<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TasksNotifyFactory extends Factory
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
            'type' => 4,
            'number' => $this->faker->numerify('##########'),
            'issueAt' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
            'duration' => rand(1,24),


        ];
    }
}
