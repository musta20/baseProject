<?php

namespace Database\Factories;

use App\Enums\ReportTtpe;
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
            'type' => rand(0,4),
            'reporttype' =>  ReportTtpe::BILL->value,
            'file' => rand(1,4),
            'from' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
            'to' => $this->faker->dateTimeInInterval('-3 week', '+1 days'),
        ];
    }
}
