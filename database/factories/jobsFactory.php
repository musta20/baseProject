<?php

namespace Database\Factories;

use App\Models\job_city;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jobs>
 */
class jobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->name(),
            "des" => $this->faker->name(),
            "job_cities_id" => job_city::factory()->create()->id
        ];
    }
}
