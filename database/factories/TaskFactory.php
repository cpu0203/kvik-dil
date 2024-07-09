<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(2),
            'description' => fake()->sentence(2),
            'status' => rand(0, 1),
            'end_date' => '2024-07-09',
            // 'end_date' => fake()->dateTimeBetween((2024-07-29), (2024-11-29))
        ];
    }
}
