<?php

namespace Database\Factories\LMS;

use App\Models\LMS\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LMS\CourseCategory>
 */
class CourseCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'order' => $this->faker->numberBetween(0, 10),
            'is_published' => $this->faker->boolean(80),
        ];
    }
}
