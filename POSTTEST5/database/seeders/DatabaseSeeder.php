<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            GigSeeder::class,
            SkillSeeder::class,
            PortfolioSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
