<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all projects to attach images to
        $projects = Project::all();

        if ($projects->isEmpty()) {
            $this->command->info('No projects found. Please run ProjectSeeder first.');
            return;
        }

        foreach ($projects as $index => $project) {
            // Add multiple images for each project
            $imagePaths = [
                'assets/img/project/project_3_1.jpg',
                'assets/img/project/project_3_2.jpg',
                'assets/img/project/project_3_3.jpg',
                'assets/img/project/project_3_4.jpg',
                'assets/img/project/project_3_5.jpg',
                'assets/img/project/project_3_6.jpg',
            ];

            // Add 2-4 images per project depending on the project index
            $numImages = 2 + ($index % 3); // 2, 3, or 4 images per project

            for ($i = 0; $i < $numImages; $i++) {
                $imageIndex = ($index + $i) % count($imagePaths);

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image' => $imagePaths[$imageIndex], // We'll copy these to storage later
                    'caption' => $project->title . ' - View ' . ($i + 1),
                ]);
            }
        }

        // For demonstration purposes, we'll also add a cover image to each project
        foreach ($projects as $index => $project) {
            $coverImagePaths = [
                'assets/img/project/project_1_1.jpg',
                'assets/img/project/project_2_1.jpg',
                'assets/img/project/project_4_1.jpg',
                'assets/img/project/project_5_1.jpg',
                'assets/img/project/project_details.jpg',
            ];

            $coverIndex = $index % count($coverImagePaths);

            // Update the project with a cover image
            $project->update([
                'cover_image' => $coverImagePaths[$coverIndex]
            ]);
        }
    }
}
