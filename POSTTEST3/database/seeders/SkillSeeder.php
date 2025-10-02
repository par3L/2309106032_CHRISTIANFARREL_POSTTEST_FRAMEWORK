<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Skill::factory(20)->create();
        
        // Attach random skills to users
        $users = \App\Models\User::all();
        $skills = \App\Models\Skill::all();
        
        foreach ($users as $user) {
            $user->skills()->attach(
                $skills->random(rand(2, 5))->pluck('id')->toArray()
            );
        }
    }
}
