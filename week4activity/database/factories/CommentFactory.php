<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment_content' => fake()->paragraph(),
            'comment_date' => fake()->dateTimeThisYear(),
            'reviewer_name' => fake()->name(),
            'reviewer_email' => fake()->safeEmail(),
            'is_hidden' => fake()->boolean(10),
            'user_id' => User::factory(),
        ];
    }
}
