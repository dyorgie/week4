<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roleMap = [
            'A' => 'Administrator - full access',
            'C' => 'Contributor - can create content',
            'S' => 'Subscriber - read-only access',
        ];


        $role = $this->faker->randomElement(array_keys($roleMap));

        return [
            'role_name' => $role,
            'description' => $roleMap[$role],
        ];
    }
}
