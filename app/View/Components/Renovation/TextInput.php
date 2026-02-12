<?php

namespace App\View\Components\Renovation;

use Illuminate\View\Component;
use Illuminate\View\View;

class TextInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $label,
        public ?string $value = null,
        public ?string $placeholder = null,
        public ?string $error = null,
        public bool $required = false,
        public ?int $maxlength = 255
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.renovation.text-input');
    }
}
