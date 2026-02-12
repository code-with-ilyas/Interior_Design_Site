<?php

namespace App\Enums;

enum RenovationCategory: string
{
    case PARTIAL_RENOVATION = 'partial-renovation';
    case COMPLETE_RENOVATION = 'complete-renovation';
    case ENERGY_RENOVATION = 'energy-renovation';
    case SMALL_SPECIFIC_WORKS = 'small-specific-works';
    case HOME_ELEVATION = 'home-elevation';
    case HOME_EXTENSION = 'home-extension';

    public function label(): string
    {
        return match($this) {
            self::PARTIAL_RENOVATION => 'Partial Renovation',
            self::COMPLETE_RENOVATION => 'Complete Renovation',
            self::ENERGY_RENOVATION => 'Energy Renovation',
            self::SMALL_SPECIFIC_WORKS => 'Small Specific Works',
            self::HOME_ELEVATION => 'Home Elevation',
            self::HOME_EXTENSION => 'Home Extension',
        };
    }

    public function description(): string
    {
        return match($this) {
            self::PARTIAL_RENOVATION => 'Renovate specific rooms or areas',
            self::COMPLETE_RENOVATION => 'Full home renovation project',
            self::ENERGY_RENOVATION => 'Improve energy efficiency',
            self::SMALL_SPECIFIC_WORKS => 'Small repairs and improvements',
            self::HOME_ELEVATION => 'Add floors to your home',
            self::HOME_EXTENSION => 'Expand your living space',
        };
    }

    public function icon(): string
    {
        return match($this) {
            self::PARTIAL_RENOVATION => 'fa-paint-roller',
            self::COMPLETE_RENOVATION => 'fa-home',
            self::ENERGY_RENOVATION => 'fa-bolt',
            self::SMALL_SPECIFIC_WORKS => 'fa-tools',
            self::HOME_ELEVATION => 'fa-arrow-up',
            self::HOME_EXTENSION => 'fa-expand',
        };
    }

    public function order(): int
    {
        return match($this) {
            self::PARTIAL_RENOVATION => 1,
            self::COMPLETE_RENOVATION => 2,
            self::ENERGY_RENOVATION => 3,
            self::SMALL_SPECIFIC_WORKS => 4,
            self::HOME_ELEVATION => 5,
            self::HOME_EXTENSION => 6,
        };
    }

    /**
     * Get all steps for this category
     *
     * @return array<int, array{
     *   number: int,
     *   title: string,
     *   description: string,
     *   input_type: string,
     *   options: array<array{value: string, label: string, icon?: string}>,
     *   required: bool
     * }>
     */
    public function steps(): array
    {
        return match($this) {
            self::COMPLETE_RENOVATION => [
                [
                    'number' => 1,
                    'title' => 'Budget Range',
                    'description' => 'What budget would you like to assign to your renovation project?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'under-50k', 'label' => 'Under €50,000'],
                        ['value' => '50k-100k', 'label' => '€50,000 - €100,000'],
                        ['value' => '100k-200k', 'label' => '€100,000 - €200,000'],
                        ['value' => 'over-200k', 'label' => 'Over €200,000'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 2,
                    'title' => 'Surface Area',
                    'description' => 'What is the surface area to renovate?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'under-50', 'label' => 'Under 50 m²'],
                        ['value' => '50-100', 'label' => '50 - 100 m²'],
                        ['value' => '100-150', 'label' => '100 - 150 m²'],
                        ['value' => 'over-150', 'label' => 'Over 150 m²'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 3,
                    'title' => 'Room Types',
                    'description' => 'Which types of rooms would you like to renovate? (Select one or more)',
                    'input_type' => 'checkbox',
                    'options' => [
                        ['value' => 'bathroom', 'label' => 'Bathroom', 'icon' => 'fa-bath'],
                        ['value' => 'kitchen', 'label' => 'Kitchen', 'icon' => 'fa-utensils'],
                        ['value' => 'living-room', 'label' => 'Living Room', 'icon' => 'fa-couch'],
                        ['value' => 'bedroom', 'label' => 'Bedroom', 'icon' => 'fa-bed'],
                        ['value' => 'toilet', 'label' => 'Toilet', 'icon' => 'fa-toilet'],
                        ['value' => 'other', 'label' => 'Other', 'icon' => 'fa-home'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 4,
                    'title' => 'Project Timeline',
                    'description' => 'When would you like to start the project?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'asap', 'label' => 'As soon as possible'],
                        ['value' => '1-3-months', 'label' => 'In 1-3 months'],
                        ['value' => '3-6-months', 'label' => 'In 3-6 months'],
                        ['value' => 'over-6-months', 'label' => 'In more than 6 months'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 5,
                    'title' => 'Additional Details',
                    'description' => 'Please provide any additional information about your project',
                    'input_type' => 'textarea',
                    'options' => [],
                    'required' => false,
                ],
            ],
            self::PARTIAL_RENOVATION => [
                [
                    'number' => 1,
                    'title' => 'Room Selection',
                    'description' => 'Which room would you like to renovate?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'bathroom', 'label' => 'Bathroom', 'icon' => 'fa-bath'],
                        ['value' => 'kitchen', 'label' => 'Kitchen', 'icon' => 'fa-utensils'],
                        ['value' => 'living-room', 'label' => 'Living Room', 'icon' => 'fa-couch'],
                        ['value' => 'bedroom', 'label' => 'Bedroom', 'icon' => 'fa-bed'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 2,
                    'title' => 'Budget Range',
                    'description' => 'What is your budget for this renovation?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'under-10k', 'label' => 'Under €10,000'],
                        ['value' => '10k-25k', 'label' => '€10,000 - €25,000'],
                        ['value' => '25k-50k', 'label' => '€25,000 - €50,000'],
                        ['value' => 'over-50k', 'label' => 'Over €50,000'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 3,
                    'title' => 'Additional Details',
                    'description' => 'Please describe what you would like to renovate',
                    'input_type' => 'textarea',
                    'options' => [],
                    'required' => false,
                ],
            ],
            self::ENERGY_RENOVATION => [
                [
                    'number' => 1,
                    'title' => 'Energy Improvements',
                    'description' => 'Which energy improvements are you interested in?',
                    'input_type' => 'checkbox',
                    'options' => [
                        ['value' => 'insulation', 'label' => 'Insulation'],
                        ['value' => 'windows', 'label' => 'Windows & Doors'],
                        ['value' => 'heating', 'label' => 'Heating System'],
                        ['value' => 'solar', 'label' => 'Solar Panels'],
                        ['value' => 'ventilation', 'label' => 'Ventilation'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 2,
                    'title' => 'Current DPE Rating',
                    'description' => 'What is your current energy performance rating?',
                    'input_type' => 'select',
                    'options' => [
                        ['value' => 'a', 'label' => 'A (Excellent)'],
                        ['value' => 'b', 'label' => 'B (Very Good)'],
                        ['value' => 'c', 'label' => 'C (Good)'],
                        ['value' => 'd', 'label' => 'D (Average)'],
                        ['value' => 'e', 'label' => 'E (Below Average)'],
                        ['value' => 'f', 'label' => 'F (Poor)'],
                        ['value' => 'g', 'label' => 'G (Very Poor)'],
                        ['value' => 'unknown', 'label' => 'I don\'t know'],
                    ],
                    'required' => false,
                ],
                [
                    'number' => 3,
                    'title' => 'Additional Information',
                    'description' => 'Any additional details about your energy renovation project?',
                    'input_type' => 'textarea',
                    'options' => [],
                    'required' => false,
                ],
            ],
            self::SMALL_SPECIFIC_WORKS => [
                [
                    'number' => 1,
                    'title' => 'Type of Work',
                    'description' => 'What type of work do you need?',
                    'input_type' => 'checkbox',
                    'options' => [
                        ['value' => 'painting', 'label' => 'Painting'],
                        ['value' => 'flooring', 'label' => 'Flooring'],
                        ['value' => 'plumbing', 'label' => 'Plumbing'],
                        ['value' => 'electrical', 'label' => 'Electrical'],
                        ['value' => 'carpentry', 'label' => 'Carpentry'],
                        ['value' => 'other', 'label' => 'Other'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 2,
                    'title' => 'Work Description',
                    'description' => 'Please describe the work you need done',
                    'input_type' => 'textarea',
                    'options' => [],
                    'required' => true,
                ],
            ],
            self::HOME_ELEVATION => [
                [
                    'number' => 1,
                    'title' => 'Number of Floors',
                    'description' => 'How many floors would you like to add?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => '1', 'label' => '1 floor'],
                        ['value' => '2', 'label' => '2 floors'],
                        ['value' => '3+', 'label' => '3 or more floors'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 2,
                    'title' => 'Estimated Surface',
                    'description' => 'What is the estimated surface area to add?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'under-50', 'label' => 'Under 50 m²'],
                        ['value' => '50-100', 'label' => '50 - 100 m²'],
                        ['value' => 'over-100', 'label' => 'Over 100 m²'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 3,
                    'title' => 'Project Details',
                    'description' => 'Please provide additional details about your elevation project',
                    'input_type' => 'textarea',
                    'options' => [],
                    'required' => false,
                ],
            ],
            self::HOME_EXTENSION => [
                [
                    'number' => 1,
                    'title' => 'Extension Type',
                    'description' => 'What type of extension are you planning?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'side', 'label' => 'Side Extension'],
                        ['value' => 'rear', 'label' => 'Rear Extension'],
                        ['value' => 'wrap-around', 'label' => 'Wrap-Around Extension'],
                        ['value' => 'conservatory', 'label' => 'Conservatory'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 2,
                    'title' => 'Extension Size',
                    'description' => 'What is the planned size of the extension?',
                    'input_type' => 'radio',
                    'options' => [
                        ['value' => 'under-20', 'label' => 'Under 20 m²'],
                        ['value' => '20-40', 'label' => '20 - 40 m²'],
                        ['value' => '40-60', 'label' => '40 - 60 m²'],
                        ['value' => 'over-60', 'label' => 'Over 60 m²'],
                    ],
                    'required' => true,
                ],
                [
                    'number' => 3,
                    'title' => 'Project Details',
                    'description' => 'Please provide additional details about your extension project',
                    'input_type' => 'textarea',
                    'options' => [],
                    'required' => false,
                ],
            ],
        };
    }

    public function totalSteps(): int
    {
        return count($this->steps());
    }

    public function getStep(int $stepNumber): ?array
    {
        $steps = $this->steps();
        foreach ($steps as $step) {
            if ($step['number'] === $stepNumber) {
                return $step;
            }
        }
        return null;
    }

    public static function fromSlug(string $slug): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $slug) {
                return $case;
            }
        }
        return null;
    }

    public static function allOrdered(): array
    {
        $cases = self::cases();
        usort($cases, fn($a, $b) => $a->order() <=> $b->order());
        return $cases;
    }
}
