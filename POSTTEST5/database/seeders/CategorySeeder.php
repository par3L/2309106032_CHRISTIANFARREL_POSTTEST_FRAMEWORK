<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Programming & Tech',
                'slug' => 'programming-tech',
                'description' => 'Web development, mobile apps, software development',
                'icon' => '💻',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Graphics & Design',
                'slug' => 'graphics-design',
                'description' => 'Logo design, web design, illustration',
                'icon' => '🎨',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Social media marketing, SEO, content marketing',
                'icon' => '📱',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Writing & Translation',
                'slug' => 'writing-translation',
                'description' => 'Content writing, copywriting, translation services',
                'icon' => '✍️',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Video & Animation',
                'slug' => 'video-animation',
                'description' => 'Video editing, animation, motion graphics',
                'icon' => '🎬',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Music & Audio',
                'slug' => 'music-audio',
                'description' => 'Music production, audio editing, voiceover',
                'icon' => '🎵',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
