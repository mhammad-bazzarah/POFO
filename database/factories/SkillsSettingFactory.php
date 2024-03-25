<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillsSetting>
 */
class SkillsSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Skills',
            'sub_title'=> fake()->paragraph(3),
            'image' =>"/defaults/skill.jpg"
        ];
    }
}
