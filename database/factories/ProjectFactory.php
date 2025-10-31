<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        // pick a random user (or first user)
        $user = User::first() ?? User::factory()->create();

        return [
            'name' => fake()->sentence(),
            'description' => fake()->realText(),
            'due_date' => fake()->dateTimeBetween('now', '+1 year'),
            'status' => fake()->randomElement(['pending', 'in_progress', 'completed']),
            'image_path' => 'https://picsum.photos/seed/' . fake()->uuid() . '/640/480',
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ];
    }
}
