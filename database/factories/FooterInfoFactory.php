<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FooterInfo>
 */
class FooterInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'info' => fake()->sentence(8),
            'copy_right' => 'Copyright 2024 Bazzarah. All Rights Reserved.',
            'powered_by' => 'Powered by Bazzarah   |   2023 - 2024'
        ];
    }
}
