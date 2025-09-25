<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gig;
use Illuminate\Support\Str;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gigs = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'I will create a modern responsive website with Laravel',
                'slug' => Str::slug('I will create a modern responsive website with Laravel'),
                'description' => 'I will build you a professional, modern, and fully responsive website using Laravel framework. Your website will be fast, secure, and SEO-friendly.',
                                'images' => ['https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop&auto=format'],
                'price' => 150.00,
                'delivery_time' => 7,
                'revisions' => 2,
                'rating' => 4.9,
                'reviews_count' => 127,
                'orders_count' => 89,
                'is_active' => true,
                'featured' => true,
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'I will develop a mobile app with React Native',
                'slug' => Str::slug('I will develop a mobile app with React Native'),
                'description' => 'Professional mobile app development using React Native. Cross-platform compatibility for iOS and Android.',
                                'images' => ['https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&h=300&fit=crop&auto=format'],
                'price' => 300.00,
                'delivery_time' => 14,
                'revisions' => 3,
                'rating' => 4.8,
                'reviews_count' => 64,
                'orders_count' => 45,
                'is_active' => true,
                'featured' => false,
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'title' => 'I will design a professional logo and brand identity',
                'slug' => Str::slug('I will design a professional logo and brand identity'),
                'description' => 'Get a stunning logo design and complete brand identity package. Includes multiple concepts, unlimited revisions, and all file formats.',
                                'images' => ['https://images.unsplash.com/photo-1558655146-d09347e92766?w=400&h=300&fit=crop&auto=format'],
                'price' => 75.00,
                'delivery_time' => 5,
                'revisions' => 5,
                'rating' => 4.9,
                'reviews_count' => 203,
                'orders_count' => 156,
                'is_active' => true,
                'featured' => true,
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'title' => 'I will create modern UI/UX design for your app',
                'slug' => Str::slug('I will create modern UI/UX design for your app'),
                'description' => 'Professional UI/UX design for mobile apps and websites. User-centered design approach with modern aesthetics.',
                                'images' => ['https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=300&fit=crop&auto=format'],
                'price' => 120.00,
                'delivery_time' => 10,
                'revisions' => 3,
                'rating' => 4.7,
                'reviews_count' => 89,
                'orders_count' => 67,
                'is_active' => true,
                'featured' => false,
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'title' => 'I will boost your SEO ranking with proven strategies',
                'slug' => Str::slug('I will boost your SEO ranking with proven strategies'),
                'description' => 'Increase your website visibility with advanced SEO techniques. Keyword research, on-page optimization, and link building.',
                                'images' => ['https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=400&h=300&fit=crop&auto=format'],
                'price' => 90.00,
                'delivery_time' => 7,
                'revisions' => 2,
                'rating' => 4.8,
                'reviews_count' => 156,
                'orders_count' => 98,
                'is_active' => true,
                'featured' => true,
            ],
            [
                'user_id' => 1,
                'category_id' => 4,
                'title' => 'I will write engaging blog posts and articles',
                'slug' => Str::slug('I will write engaging blog posts and articles'),
                'description' => 'High-quality, SEO-optimized content writing for your blog or website. Well-researched and engaging articles.',
                                'images' => ['https://images.unsplash.com/photo-1455390582262-044cdead277a?w=400&h=300&fit=crop&auto=format'],
                'price' => 25.00,
                'delivery_time' => 3,
                'revisions' => 2,
                'rating' => 4.9,
                'reviews_count' => 234,
                'orders_count' => 187,
                'is_active' => true,
                'featured' => false,
            ],
            [
                'user_id' => 1,
                'category_id' => 5,
                'title' => 'I will create professional video editing and motion graphics',
                'slug' => Str::slug('I will create professional video editing and motion graphics'),
                'description' => 'Professional video editing with motion graphics, color grading, and sound design. Perfect for marketing videos.',
                'images' => ['https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=400&h=300&fit=crop&crop=center'],
                'price' => 180.00,
                'delivery_time' => 12,
                'revisions' => 2,
                'rating' => 4.8,
                'reviews_count' => 76,
                'orders_count' => 54,
                'is_active' => true,
                'featured' => false,
            ],
            [
                'user_id' => 1,
                'category_id' => 6,
                'title' => 'I will produce high-quality background music and jingles',
                'slug' => Str::slug('I will produce high-quality background music and jingles'),
                'description' => 'Custom background music and jingles for your projects. Professional mixing and mastering included.',
                'images' => ['https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=400&h=300&fit=crop&auto=format'],
                'price' => 65.00,
                'delivery_time' => 5,
                'revisions' => 3,
                'rating' => 4.7,
                'reviews_count' => 43,
                'orders_count' => 32,
                'is_active' => true,
                'featured' => true,
            ],
        ];

        foreach ($gigs as $gigData) {
            Gig::create($gigData);
        }
    }
}
