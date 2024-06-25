<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'des' => $this->faker->paragraph,
            'icon' => $this->faker->imageUrl(), // You might want to change this to a proper icon source
        ];
    }

    public function withImage($image): Factory
    {
        return $this->state(fn (array $attributes) => ['icon' => $image]);

    }
}
