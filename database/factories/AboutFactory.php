<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->title(),
            'description'=> fake()->paragraph(6),
            'image' => "/defaults/about.png",
            'resume'=> "/defaults/about-resume.pdf"
        ];
    }
}
