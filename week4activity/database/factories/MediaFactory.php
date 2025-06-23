<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_name' => fake()->word() . '.jpg',
            'file_type' => 'jpg',
            'file_size' => fake()->numberBetween(100, 5000),
            'url' => fake()->imageUrl(640, 480, 'animals', true),
            'upload_date' => fake()->dateTimeThisYear(),
            'description' => fake()->sentence(),
            'post_id' => Post::factory(),
        ];
    }
}
