<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => '5 Years Experiences on Design & Development.' ,
            'description' => fake()->paragraph(6),
            'phone' =>fake()->phoneNumber(),
            'email' =>fake()->email(),
            'image' => '/defaults/exper.jpg'
        ];
    }
}
