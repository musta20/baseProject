<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'isread' => rand(0,1),
            'isdone' =>  rand(0,1),
            'boss_id' => User::factory()->create()->id,
            
            'des' => $this->faker->paragraph(),
            'title' => $this->faker->name(),

            'start' => $this->faker->dateTimeInInterval('-1 week', '+1 days'),

            'end' =>  $this->faker->dateTimeInInterval('-1 week', '+1 days'),

            'created_at' => $this->faker->dateTimeInInterval('-1 week', '+3 days'),

        ];
    }

    public function withManger($id)
    {
        return $this->state(function (array $attributes) use($id) {
            return [
                'boss_id' => $id,
            ];
        });
    }



}
