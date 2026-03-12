<?php

namespace Database\Factories\Quiz;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz\Quiz>
 */
class QuizFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'is_active' => $this->faker->boolean(70),
        ];
    }

    public function active(): static
    {
        return $this->state(['is_active' => true]);
    }

    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
