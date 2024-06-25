<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(100, 1000), // Adjust the range as per your requirement
            // 'cat_id' => $this->faker->numberBetween(1, 10), // Assuming categories are from 1 to 10
            'des' => $this->faker->paragraph,
            'icon' => $this->faker->imageUrl(), // You might want to change this to a proper icon source
            'category_id' => category::factory()->create()->id, // Assuming categories are from 1 to 10

        ];
    }

    public function withCategory($cat): Factory
    {

        return $this->state(fn (array $attributes) => ['category_id' => $cat]);

    }

    public function withImage($image): Factory
    {

        return $this->state(fn (array $attributes) => ['icon' => $image]);

    }
}
