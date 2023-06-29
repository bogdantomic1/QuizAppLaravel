<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'text' => fake()->sentence(),
            'answer1'=> fake()->word(),
            'answer2'=> fake()->word(),
            'correct_answer' => fake()->randomElement([1,2]),
            'category_id' => 1
        ];
    }
}
