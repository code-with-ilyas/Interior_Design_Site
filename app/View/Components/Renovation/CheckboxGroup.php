<?php

namespace App\View\Components\Renovation;

use Illuminate\View\Component;
use Illuminate\View\View;

class CheckboxGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public array $options,
        public ?array $value = null,
        public ?string $error = null,
        public bool $required = false
    ) {
        // Ensure value is always an array
        $this->value = $value ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.renovation.checkbox-group');
    }
}
