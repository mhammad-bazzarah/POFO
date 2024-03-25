<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero>
 */
class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>"Hi I'm Mhammad Bazzarah " ,
            'sub_title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque at, aperiam corrupti earum quasi, porro voluptatem commodi eos laboriosam nam quis nostrum, molestiae nesciunt dolore.' ,
            'btn_text' => 'Hire ME' ,
            'btn_url' => '#',
            'image' => "/defaults/me4.jpg"
        ];
    }
}
