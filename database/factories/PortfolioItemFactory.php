<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PortfolioItem>
 */
class PortfolioItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '/defaults/portfolio-1.jpg',
            'title' => fake()->title(),
            'description' => fake()->paragraph(5),
            'client' => fake()->name(),
            'website' => fake()->sentence(),
            'category_id' => fake()->numberBetween(1, 5)
        ];
    }
}
