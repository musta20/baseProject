<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Payment as payment;
use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => rand(100000, 1000000),
            'des' => $this->faker->paragraph(),
            'title' => $this->faker->word(),
            'name' => $this->faker->name(),
            'ip' => rand(1, 4),
            'count' => rand(1, 4),
            'time' => now(),
            'approve_time' => 'none',
            'adress' => $this->faker->address(),
            'files' => rand(1, 4),
            'service_id' => services::factory()->create()->id,
            'payed' => rand(1, 4),
            'status' => rand(0, 4),
            'code' => rand(4000, 5000),
            'delivery_id' => delivery::factory()->create()->id,
            'payment_id' => payment::factory()->create()->id,
            'created_at' => $this->faker->dateTimeInInterval('-1 week', '+1 days'),
        ];
    }

    //$this->faker->random_int(),

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
