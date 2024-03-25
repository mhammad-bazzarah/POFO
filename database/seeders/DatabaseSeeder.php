<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogSetting;
use App\Models\ContactSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSettings;
use App\Models\FooterContactInfo;
use App\Models\FooterHelpLink;
use App\Models\FooterInfo;
use App\Models\FooterSocialLink;
use App\Models\FooterUsefulLink;
use App\Models\GeneralSetting;
use App\Models\Hero;
use App\Models\HyperTitle;
use App\Models\SeoSetting;
use App\Models\Service;
use App\Models\skillsItem;
use App\Models\SkillsSetting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Hero::factory(1)->create();
        HyperTitle::factory()->count(3)->sequence(
            ['title' => "Hi I'am Mhammad Bazzarah"],
            ['title' => "I'am a Backend Developer"],
            ['title' => "I can write awesome code using laravel"],
        )
            ->create();
        Service::factory()->count(6)->create();
        About::factory()->create();
        SkillsSetting::factory()->create();
        skillsItem::factory()->count(6)->sequence(
            ['name' => 'Web Development', 'percent' => '88'],
            ['name' => 'Web Design', 'percent' => '89'],
            ['name' => 'Graphic Design', 'percent' => '76'],
            ['name' =>  'Promblem Solving', 'percent' => '92'],
            ['name' =>  'Data Base', 'percent' => '95'],
            ['name' =>  'Analytical Abilities', 'percent' => '79'],
        )
            ->create();
        Experience::factory()->create();
        FeedbackSettings::factory()->create();
        Feedback::factory()->count(6)->create();
        BlogSetting::factory()->create();
        BlogCategory::factory()->count(5)->sequence(
            ['name' => 'Web Development', 'slug' => 'Web-Development'],
            ['name' => 'Web Design', 'slug' => 'Web-Design'],
            ['name' => 'Graphic Design', 'slug' => 'Graphic-Design'],
            ['name' => 'Data Base', 'slug' => 'Data-Base'],
            ['name' => 'Promblem Solving', 'slug' => 'Promblem-Solving'],
        )
            ->create();
        Blog::factory()->count(6)->sequence(
            ['image' => '/defaults/blog-1.jpg'],
            ['image' => '/defaults/blog-2.jpg'],
            ['image' => '/defaults/blog-3.jpg'],
            ['image' => '/defaults/blog-4.jpg'],
            ['image' => '/defaults/blog-5.jpg'],
            ['image' => '/defaults/blog-6.jpg'],
        )
            ->create();
        ContactSetting::factory()->create();
        SeoSetting::factory()->create();
        GeneralSetting::factory()->create();
        FooterUsefulLink::factory()->count(4)->sequence(
            ['name' => 'Home', 'url' => '/'],
            ['name' => "About", 'url' => '#'],
            ['name' => 'Portfolio', 'url' => '#'],
            ['name' => 'Blog', 'url' => '#'],
        )
            ->create();
        FooterSocialLink::factory()->count(5)->sequence(
            ['icon' => 'fab fa-amazon', 'url' => 'https://www.amazon.com'],
            ['icon' => 'fab fa-laravel', 'url' => 'https://www.laravel.com/docs/11.x'],
            ['icon' => 'fab fa-google', 'url' => 'https://www.googl.com'],
            ['icon' => 'fas fa-school', 'url' => 'https://www.weschool.com'],
            ['icon' => 'fab fa-spotify', 'url' => 'https://www.spotify.com'],
        )->create();
        FooterInfo::factory()->create();
        FooterHelpLink::factory()->count(4)->sequence(
            ['name' => 'Privacy Policy', 'url' => '#'],
            ['name' => '404 Page ', 'url' => '#'],
            ['name' => 'Terms', 'url' => '#'],
            ['name' => 'Documentation', 'url' => '#'],
        )
            ->create();
        FooterContactInfo::factory()->create();
    }
}
