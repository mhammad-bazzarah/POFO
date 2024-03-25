<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PortfolioItem;
use App\Models\PortfolioSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortfolioSettings::factory()->create();
        Category::factory()->count(5)->sequence(
            ['name' => 'Web Development', 'slug' => 'Web-Development'],
            ['name' => 'Database', 'slug' => 'Database'],
            ['name' => 'User Interface', 'slug' => 'User-Interface'],
            ['name' => 'User Experience', 'slug' => 'User-Experience'],
            ['name' => 'Admin Panel', 'slug' => 'Admin-Panel'],
        )
            ->create();
        PortfolioItem::factory()->count(9)->sequence(
            [
                'image' => '/defaults/portfolio-1.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-2.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-3.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-4.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-5.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-6.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-7.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-8.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
            [
                'image' => '/defaults/portfolio-9.jpg',
                'title' => fake()->title(),
                'description' => fake()->paragraph(5),
                'client' => fake()->name(),
                'website' => fake()->sentence(),
                'category_id' => fake()->numberBetween(1,5)
            ],
        )
            ->create();
    }
}
