<?php

namespace Database\Factories;

use App\Models\jobs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\job_app>
 */
class job_appFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "phone" => $this->faker->phoneNumber(),
            "cert" => $this->faker->name(),
            "exp" => $this->faker->name(),
            "exp_des" => $this->faker->name(),
            "city" => $this->faker->name(),
            "job_city" => $this->faker->name(),
            "majer" => $this->faker->name(),
            "code" => $this->faker->name(),
            "cv" => $this->faker->name(),
            "about" => $this->faker->name(),
            "job_id" => jobs::factory()->create()->id

        ];
    }
}
