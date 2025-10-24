<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Programming', 'Design', 'Marketing', 'Writing', 'Translation', 'Video & Animation', 'Music & Audio', 'Business', 'Lifestyle'];
        $levels = ['beginner', 'intermediate', 'advanced', 'expert'];
        $colors = ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#8B5CF6', '#06B6D4', '#F97316', '#84CC16'];
        
        return [
            'name' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement($categories),
            'description' => $this->faker->sentence(),
            'level' => $this->faker->randomElement($levels),
            'is_featured' => $this->faker->boolean(20), // 20% chance of being featured
            'color' => $this->faker->randomElement($colors),
        ];
    }
}
