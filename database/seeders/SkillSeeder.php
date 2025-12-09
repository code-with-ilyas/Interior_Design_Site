<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
   
    public function run(): void
    {
        $skills = [
            'Interior Design',
            'Architecture',
            'Project Management',
            'Renovation',
            'Construction',
            'Planning',
            '3D Modeling',
            'CAD Design',
            'Space Planning',
            'Lighting Design'
        ];

        foreach ($skills as $skillName) {
            Skill::firstOrCreate(['name' => $skillName]);
        }
    }
}
