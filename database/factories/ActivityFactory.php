<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "causer_type" => $this->faker->word(),
            "causer_id" => $this->faker->word(),
            "description" => $this->faker->sentence(),
            "subject_type" => $this->faker->word(),
            "subject_id" => $this->faker->word(),
            "properties" => $this->faker->sentence(),
        ];
    }
}
