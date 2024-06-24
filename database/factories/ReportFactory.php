<?php

namespace Database\Factories;

use App\Enums\ReportType;
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
            'type' => rand(0, 6),
            'reporttype' => ReportType::getRandom()->value,
            'file' => rand(1, 4),
            'created_at' => $this->faker->dateTimeInInterval('-1 week', '+1 days'),

            'from' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
            'to' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
        ];
    }
}
