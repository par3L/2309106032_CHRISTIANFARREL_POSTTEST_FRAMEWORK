<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'gig_id' => \App\Models\Gig::factory(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'cancelled']),
            'total_amount' => $this->faker->randomFloat(2, 50, 1000),
            'delivery_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
