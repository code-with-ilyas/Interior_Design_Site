<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing project categories
        $residentialCategory = ProjectCategory::where('name', 'Residential')->first();
        $commercialCategory = ProjectCategory::where('name', 'Commercial')->first();
        $multipurposeCategory = ProjectCategory::where('name', 'Multipurpose')->first();
        $renovationCategory = ProjectCategory::where('name', 'Renovation')->first();
        $interiorDesignCategory = ProjectCategory::where('name', 'Interior Design')->first();

        if (!$residentialCategory || !$commercialCategory || !$multipurposeCategory) {
            $this->command->info('Please run ProjectCategorySeeder first to create categories.');
            return;
        }

        $projects = [
            [
                'project_category_id' => $residentialCategory->id,
                'title' => 'Luxury Villa Renovation',
                'slug' => 'luxury-villa-renovation',
                'short_description' => 'Complete renovation of a luxury villa with modern amenities and eco-friendly features.',
                'long_description' => '<p>This project involved a complete transformation of a 500 sqm luxury villa. We focused on creating modern living spaces while maintaining the architectural integrity of the original structure.</p><p>The renovation included a new kitchen with high-end appliances, a spa-like bathroom, and energy-efficient systems throughout. Sustainable materials were used wherever possible to minimize environmental impact.</p>',
                'property_type' => 'Villa',
                'project_type' => 'Renovation',
                'surface_area' => '500 m²',
                'condition_before' => 'Outdated fixtures and inefficient layout',
                'budget' => 150000.00,
                'cost_currency' => 'EUR',
                'duration_weeks' => 24,
                'completion_year' => 2024,
                'co2_avoided_per_year' => '15 tons',
                'location' => 'Nice, France',
                'client_name' => 'Private Client',
                'architect_name' => 'Studio Architectural',
                'contractor_name' => 'BTP Excellence',
                'materials_used' => '<ul><li>Sustainable hardwood flooring</li><li>Recycled glass countertops</li><li>Energy-efficient windows</li><li>Low-VOC paints</li></ul>',
                'challenges' => '<p>The main challenge was preserving the historical elements of the villa while incorporating modern amenities. We had to work around the existing structural elements while creating a cohesive design.</p>',
                'result_highlights' => '<p>The renovated villa now features an open-concept living area, a modern kitchen with smart home integration, and energy-efficient systems that reduced power consumption by 40%.</p>'
            ],
            [
                'project_category_id' => $commercialCategory->id,
                'title' => 'Office Space Modernization',
                'slug' => 'office-space-modernization',
                'short_description' => 'Modernization of office space to create collaborative work environments with sustainable features.',
                'long_description' => '<p>This commercial project transformed a traditional office building into a modern workspace that promotes collaboration and employee well-being. The redesign focused on creating flexible areas that can adapt to different working styles.</p><p>We incorporated biophilic design elements, natural lighting optimization, and sustainable materials to create a healthier work environment.</p>',
                'property_type' => 'Office Building',
                'project_type' => 'Modernization',
                'surface_area' => '1200 m²',
                'condition_before' => 'Traditional cubicle layout',
                'budget' => 300000.00,
                'cost_currency' => 'EUR',
                'duration_weeks' => 32,
                'completion_year' => 2024,
                'co2_avoided_per_year' => '25 tons',
                'location' => 'Paris, France',
                'client_name' => 'TechCorp Solutions',
                'architect_name' => 'Urban Design Studio',
                'contractor_name' => 'Construction Pro',
                'materials_used' => '<ul><li>Bamboo flooring</li><li>Acoustic panels made from recycled materials</li><li>LED lighting systems</li><li>Living wall installations</li></ul>',
                'challenges' => '<p>The challenge was to maintain business operations during the renovation while implementing significant structural changes to create an open, collaborative environment.</p>',
                'result_highlights' => '<p>The modernized office now features flexible workspaces, meeting rooms with smart technology, and biophilic design elements that have improved employee satisfaction scores by 35%.</p>'
            ],
            [
                'project_category_id' => $multipurposeCategory->id,
                'title' => 'Mixed-Use Development',
                'slug' => 'mixed-use-development',
                'short_description' => 'Development of a mixed-use building combining residential units with commercial spaces.',
                'long_description' => '<p>This mixed-use development combines residential apartments on the upper floors with commercial spaces at street level. The design emphasizes community interaction and sustainable urban living.</p><p>The building features green roofs, rainwater harvesting systems, and solar panels. The ground floor commercial spaces create an active street life while the residential units provide quiet, comfortable living spaces above.</p>',
                'property_type' => 'Mixed-Use Building',
                'project_type' => 'New Construction',
                'surface_area' => '2000 m²',
                'condition_before' => 'Empty lot',
                'budget' => 800000.00,
                'cost_currency' => 'EUR',
                'duration_weeks' => 60,
                'completion_year' => 2023,
                'co2_avoided_per_year' => '45 tons',
                'location' => 'Lyon, France',
                'client_name' => 'Urban Developments Inc.',
                'architect_name' => 'Metropolitan Architects',
                'contractor_name' => 'Grand Construction',
                'materials_used' => '<ul><li>Locally sourced stone cladding</li><li>High-performance insulation</li><li>Triple-glazed windows</li><li>Rainwater collection systems</li></ul>',
                'challenges' => '<p>Coordinating the different requirements for residential and commercial spaces while ensuring compliance with zoning regulations and creating a unified architectural vision.</p>',
                'result_highlights' => '<p>The development now houses 12 residential units and 8 commercial spaces, with 95% occupancy rates and LEED Gold certification achieved.</p>'
            ],
            [
                'project_category_id' => $renovationCategory->id,
                'title' => 'Historical Building Restoration',
                'slug' => 'historical-building-restoration',
                'short_description' => 'Careful restoration of a historical building while adding modern amenities and accessibility features.',
                'long_description' => '<p>This project involved the sensitive restoration of a 19th-century building with historical significance. The challenge was to preserve the original architectural features while bringing the building up to modern standards.</p><p>Specialized craftspeople were employed to restore original moldings, stained glass windows, and period fixtures. Modern systems were discretely integrated to maintain the historical character.</p>',
                'property_type' => 'Historical Building',
                'project_type' => 'Restoration',
                'surface_area' => '800 m²',
                'condition_before' => 'Deteriorated historical structure',
                'budget' => 500000.00,
                'cost_currency' => 'EUR',
                'duration_weeks' => 52,
                'completion_year' => 2023,
                'co2_avoided_per_year' => '30 tons',
                'location' => 'Bordeaux, France',
                'client_name' => 'Heritage Preservation Society',
                'architect_name' => 'Historical Architecture Ltd.',
                'contractor_name' => 'Artisanal Construction',
                'materials_used' => '<ul><li>Reclaimed timber from the same era</li><li>Lime-based mortars</li><li>Period-appropriate metals</li><li>Specialized restoration materials</li></ul>',
                'challenges' => '<p>Working with historical preservation guidelines while meeting modern safety and accessibility requirements required extensive coordination with heritage authorities.</p>',
                'result_highlights' => '<p>The restored building now serves as a cultural center with museum-quality preservation of historical features and modern accessibility features.</p>'
            ],
            [
                'project_category_id' => $interiorDesignCategory->id,
                'title' => 'Contemporary Apartment Design',
                'slug' => 'contemporary-apartment-design',
                'short_description' => 'Interior design for a contemporary apartment focusing on space optimization and luxury finishes.',
                'long_description' => '<p>This interior design project transformed a 120 sqm apartment into a luxurious, functional living space. The design maximizes natural light and creates a sense of spaciousness through clever storage solutions and minimalist aesthetics.</p><p>High-end materials and custom furniture pieces were selected to create a cohesive design that reflects the client\'s sophisticated taste while maintaining practical functionality.</p>',
                'property_type' => 'Apartment',
                'project_type' => 'Interior Design',
                'surface_area' => '120 m²',
                'condition_before' => 'Standard apartment with outdated finishes',
                'budget' => 85000.00,
                'cost_currency' => 'EUR',
                'duration_weeks' => 16,
                'completion_year' => 2024,
                'co2_avoided_per_year' => '8 tons',
                'location' => 'Marseille, France',
                'client_name' => 'Sophie Martin',
                'architect_name' => 'Elite Interior Design',
                'contractor_name' => 'Fine Construction',
                'materials_used' => '<ul><li>Italian marble surfaces</li><li>Custom cabinetry</li><li>Smart home technology</li><li>Luxury textiles</li></ul>',
                'challenges' => '<p>Maximizing storage in a limited space while maintaining the open, airy aesthetic desired by the client required innovative design solutions.</p>',
                'result_highlights' => '<p>The redesigned apartment features a seamless flow between living areas, abundant storage, and luxury finishes that create a five-star hotel feel.</p>'
            ]
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}
