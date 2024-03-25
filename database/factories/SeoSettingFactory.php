<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeoSetting>
 */
class SeoSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> 'portfolio Website',
            'description'=> 'Website To share skills,resume,projects,and contact info to get employeed',
            'keywords'=> "portfolio,web,backend,laravel,mahmmad-bazzarah,bazzarah",
        ];
    }
}
