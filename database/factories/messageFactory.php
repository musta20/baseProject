<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Models\User;
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
            'from' => User::factory()->withRole(UserRole::Admin->value)->create()->id,
            'to' => User::factory()->withRole(UserRole::Admin->value)->create()->id,
            'isred' => rand(0, 1),
            'title' => $this->faker->name(),
            'message' => $this->faker->paragraph(),

        ];
    }
}
