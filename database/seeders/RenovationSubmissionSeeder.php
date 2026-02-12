<?php

namespace Database\Seeders;

use App\Models\RenovationSubmission;
use Illuminate\Database\Seeder;

class RenovationSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $submissions = [
            // Complete Renovation - Quote Intent
            [
                'intent' => 'quote',
                'category_slug' => 'complete-renovation',
                'first_name' => 'Jean',
                'last_name' => 'Dupont',
                'email' => 'jean.dupont@example.com',
                'phone' => '+33 6 12 34 56 78',
                'address' => '15 Rue de la Paix',
                'city' => 'Paris',
                'postal_code' => '75001',
                'form_data_json' => [
                    1 => '100k-200k',
                    2 => '100-150',
                    3 => ['bathroom', 'kitchen', 'living-room'],
                    4 => '1-3-months',
                    5 => 'Looking for a complete renovation of our apartment. We want modern finishes and energy-efficient solutions.',
                ],
                'status' => 'pending',
                'ip_address' => '192.168.1.1',
                'created_at' => now()->subDays(2),
            ],

            // Partial Renovation - Estimate Intent
            [
                'intent' => 'estimate',
                'category_slug' => 'partial-renovation',
                'first_name' => 'Marie',
                'last_name' => 'Martin',
                'email' => 'marie.martin@example.com',
                'phone' => '+33 6 23 45 67 89',
                'address' => '42 Avenue des Champs',
                'city' => 'Lyon',
                'postal_code' => '69001',
                'form_data_json' => [
                    1 => 'bathroom',
                    2 => '10k-25k',
                    3 => 'Need to renovate the main bathroom. Replace bathtub with walk-in shower, new tiles, and modern fixtures.',
                ],
                'status' => 'reviewed',
                'ip_address' => '192.168.1.2',
                'created_at' => now()->subDays(5),
            ],

            // Energy Renovation - Energy Performance Intent
            [
                'intent' => 'energy-performance',
                'category_slug' => 'energy-renovation',
                'first_name' => 'Pierre',
                'last_name' => 'Bernard',
                'email' => 'pierre.bernard@example.com',
                'phone' => '+33 6 34 56 78 90',
                'address' => '8 Boulevard Victor Hugo',
                'city' => 'Marseille',
                'postal_code' => '13001',
                'form_data_json' => [
                    1 => ['insulation', 'windows', 'heating'],
                    2 => 'e',
                    3 => 'Our house has poor insulation and old windows. We want to improve energy efficiency and reduce heating costs.',
                ],
                'status' => 'completed',
                'ip_address' => '192.168.1.3',
                'created_at' => now()->subDays(10),
            ],

            // Small Specific Works - Company Intent
            [
                'intent' => 'company',
                'category_slug' => 'small-specific-works',
                'first_name' => 'Sophie',
                'last_name' => 'Dubois',
                'email' => 'sophie.dubois@example.com',
                'phone' => null,
                'address' => null,
                'city' => 'Toulouse',
                'postal_code' => '31000',
                'form_data_json' => [
                    1 => ['painting', 'flooring'],
                    2 => 'Need to repaint living room and bedroom, and install new laminate flooring in the hallway.',
                ],
                'status' => 'pending',
                'ip_address' => '192.168.1.4',
                'created_at' => now()->subDays(1),
            ],

            // Home Elevation - Inspiration Intent
            [
                'intent' => 'inspiration',
                'category_slug' => 'home-elevation',
                'first_name' => 'Luc',
                'last_name' => 'Moreau',
                'email' => 'luc.moreau@example.com',
                'phone' => '+33 6 45 67 89 01',
                'address' => '23 Rue du Commerce',
                'city' => 'Nice',
                'postal_code' => '06000',
                'form_data_json' => [
                    1 => '1',
                    2 => '50-100',
                    3 => 'Considering adding a floor to create additional bedrooms and a home office. Need ideas and feasibility assessment.',
                ],
                'status' => 'reviewed',
                'ip_address' => '192.168.1.5',
                'created_at' => now()->subDays(7),
            ],

            // Home Extension - Quote Intent
            [
                'intent' => 'quote',
                'category_slug' => 'home-extension',
                'first_name' => 'Claire',
                'last_name' => 'Petit',
                'email' => 'claire.petit@example.com',
                'phone' => '+33 6 56 78 90 12',
                'address' => '67 Rue de la République',
                'city' => 'Bordeaux',
                'postal_code' => '33000',
                'form_data_json' => [
                    1 => 'rear',
                    2 => '20-40',
                    3 => 'Planning a rear extension to expand the kitchen and create an open-plan living space.',
                ],
                'status' => 'pending',
                'ip_address' => '192.168.1.6',
                'created_at' => now()->subHours(12),
            ],

            // Complete Renovation - Other Intent
            [
                'intent' => 'other',
                'category_slug' => 'complete-renovation',
                'first_name' => 'Thomas',
                'last_name' => 'Roux',
                'email' => 'thomas.roux@example.com',
                'phone' => '+33 6 67 89 01 23',
                'address' => '91 Avenue de la Liberté',
                'city' => 'Nantes',
                'postal_code' => '44000',
                'form_data_json' => [
                    1 => '50k-100k',
                    2 => '50-100',
                    3 => ['kitchen', 'bedroom', 'toilet'],
                    4 => '3-6-months',
                    5 => 'Inherited property that needs complete renovation before we can move in.',
                ],
                'status' => 'completed',
                'ip_address' => '192.168.1.7',
                'created_at' => now()->subDays(15),
            ],

            // Partial Renovation - Quote Intent
            [
                'intent' => 'quote',
                'category_slug' => 'partial-renovation',
                'first_name' => 'Isabelle',
                'last_name' => 'Laurent',
                'email' => 'isabelle.laurent@example.com',
                'phone' => '+33 6 78 90 12 34',
                'address' => '34 Rue Saint-Michel',
                'city' => 'Strasbourg',
                'postal_code' => '67000',
                'form_data_json' => [
                    1 => 'kitchen',
                    2 => '25k-50k',
                    3 => 'Complete kitchen renovation with new cabinets, countertops, and appliances.',
                ],
                'status' => 'reviewed',
                'ip_address' => '192.168.1.8',
                'created_at' => now()->subDays(4),
            ],

            // Energy Renovation - Estimate Intent
            [
                'intent' => 'estimate',
                'category_slug' => 'energy-renovation',
                'first_name' => 'François',
                'last_name' => 'Simon',
                'email' => 'francois.simon@example.com',
                'phone' => null,
                'address' => '56 Boulevard Gambetta',
                'city' => 'Lille',
                'postal_code' => '59000',
                'form_data_json' => [
                    1 => ['solar', 'ventilation'],
                    2 => 'unknown',
                    3 => 'Interested in solar panels and improving ventilation system.',
                ],
                'status' => 'pending',
                'ip_address' => '192.168.1.9',
                'created_at' => now()->subDays(3),
            ],

            // Small Specific Works - Quote Intent
            [
                'intent' => 'quote',
                'category_slug' => 'small-specific-works',
                'first_name' => 'Nathalie',
                'last_name' => 'Leroy',
                'email' => 'nathalie.leroy@example.com',
                'phone' => '+33 6 89 01 23 45',
                'address' => '12 Place de la Mairie',
                'city' => 'Rennes',
                'postal_code' => '35000',
                'form_data_json' => [
                    1 => ['plumbing', 'electrical'],
                    2 => 'Fix leaking pipes in basement and upgrade electrical panel to support new appliances.',
                ],
                'status' => 'completed',
                'ip_address' => '192.168.1.10',
                'created_at' => now()->subDays(20),
            ],

            // Home Extension - Company Intent
            [
                'intent' => 'company',
                'category_slug' => 'home-extension',
                'first_name' => 'Antoine',
                'last_name' => 'Fournier',
                'email' => 'antoine.fournier@example.com',
                'phone' => '+33 6 90 12 34 56',
                'address' => '78 Rue Nationale',
                'city' => 'Montpellier',
                'postal_code' => '34000',
                'form_data_json' => [
                    1 => 'conservatory',
                    2 => 'under-20',
                    3 => 'Looking for a company to build a small conservatory for a garden room.',
                ],
                'status' => 'pending',
                'ip_address' => '192.168.1.11',
                'created_at' => now()->subHours(6),
            ],

            // Complete Renovation - Estimate Intent
            [
                'intent' => 'estimate',
                'category_slug' => 'complete-renovation',
                'first_name' => 'Céline',
                'last_name' => 'Girard',
                'email' => 'celine.girard@example.com',
                'phone' => '+33 6 01 23 45 67',
                'address' => '45 Avenue Jean Jaurès',
                'city' => 'Grenoble',
                'postal_code' => '38000',
                'form_data_json' => [
                    1 => 'under-50k',
                    2 => 'under-50',
                    3 => ['bathroom', 'bedroom'],
                    4 => 'asap',
                    5 => 'Small apartment renovation needed urgently.',
                ],
                'status' => 'reviewed',
                'ip_address' => '192.168.1.12',
                'created_at' => now()->subDays(6),
            ],
        ];

        foreach ($submissions as $submission) {
            RenovationSubmission::create($submission);
        }
    }
}

