<?php

namespace App\Enums;

enum RenovationIntent: string
{
    case QUOTE = 'quote';
    case ESTIMATE = 'estimate';
    case COMPANY = 'company';
    case ENERGY_PERFORMANCE = 'energy-performance';
    case INSPIRATION = 'inspiration';
    case OTHER = 'other';

    public function label(): string
    {
        return match($this) {
            self::QUOTE => 'I need a quote',
            self::ESTIMATE => 'I would like an estimate',
            self::COMPANY => 'I am looking for a company',
            self::ENERGY_PERFORMANCE => 'I want to improve the energy performance rating (DPE)',
            self::INSPIRATION => 'I am looking for inspiration',
            self::OTHER => 'Other',
        };
    }

    public function description(): ?string
    {
        return match($this) {
            self::QUOTE => 'Get a detailed quote for your renovation project',
            self::ESTIMATE => 'Receive a cost estimate for your work',
            self::COMPANY => 'Find the right renovation company',
            self::ENERGY_PERFORMANCE => 'Improve your home\'s energy efficiency',
            self::INSPIRATION => 'Explore renovation ideas and possibilities',
            self::OTHER => 'Other renovation needs',
        };
    }

    public function icon(): string
    {
        return match($this) {
            self::QUOTE => 'fa-file-invoice',
            self::ESTIMATE => 'fa-calculator',
            self::COMPANY => 'fa-building',
            self::ENERGY_PERFORMANCE => 'fa-leaf',
            self::INSPIRATION => 'fa-lightbulb',
            self::OTHER => 'fa-ellipsis-h',
        };
    }
}
