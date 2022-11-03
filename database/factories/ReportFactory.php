<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 1,
            'reporttype' => "bill",
            'file' => rand(1,4),
            'from' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
            'to' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
        ];
    }
}
