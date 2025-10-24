<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->catchPhrase();
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => fake()->numberBetween(1, 6), // assuming 6 categories from seeder
            'title' => 'I will ' . strtolower($title),
            'slug' => \Illuminate\Support\Str::slug('I will ' . $title),
            'description' => fake()->paragraphs(3, true),
            'price' => fake()->randomFloat(2, 25, 500),
            'delivery_time' => fake()->numberBetween(1, 30),
            'is_active' => fake()->boolean(90), // 90% chance of being active
        ];
    }
}
