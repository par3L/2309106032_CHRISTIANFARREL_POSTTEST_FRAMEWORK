<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $technologies = ['PHP', 'Laravel', 'JavaScript', 'React', 'Vue.js', 'MySQL', 'PostgreSQL', 'Python', 'Django', 'Node.js', 'WordPress', 'Shopify'];
        
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->catchPhrase(),
            'description' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(800, 600, 'technics'),
            'project_url' => $this->faker->optional(70)->url(),
            'technologies' => $this->faker->randomElements($technologies, $this->faker->numberBetween(2, 5)),
            'completed_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
