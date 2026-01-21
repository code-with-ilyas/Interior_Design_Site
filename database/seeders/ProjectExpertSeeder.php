<?php

namespace Database\Seeders;

use App\Models\Expert;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all projects and experts
        $projects = Project::all();
        $experts = Expert::all();

        if ($projects->isEmpty()) {
            $this->command->info('No projects found. Please run ProjectSeeder first.');
            return;
        }

        if ($experts->isEmpty()) {
            $this->command->info('No experts found. Please run ExpertSeeder first.');
            return;
        }

        // Attach 2-4 experts to each project
        foreach ($projects as $index => $project) {
            $numExperts = 2 + ($index % 3); // 2, 3, or 4 experts per project

            // Select experts based on the project index to create variety
            $selectedExperts = $experts->slice($index * 2, $numExperts);

            foreach ($selectedExperts as $expertIndex => $expert) {
                $roles = [
                    'Lead Architect',
                    'Project Manager',
                    'Interior Designer',
                    'Structural Engineer',
                    'Sustainability Consultant',
                    'Site Supervisor',
                    'Quality Control Manager'
                ];

                $role = $roles[($index + $expertIndex) % count($roles)];

                $project->experts()->attach($expert->id, [
                    'role' => $role
                ]);
            }
        }
    }
}
