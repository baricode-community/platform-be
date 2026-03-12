<?php

namespace Database\Factories\Quiz;

use App\Models\Quiz\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz\Question>
 */
class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::factory(),
            'question_text' => $this->faker->sentence(8) . '?',
            'order' => $this->faker->numberBetween(1, 20),
        ];
    }
}
