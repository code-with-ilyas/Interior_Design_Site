<?php

namespace App\View\Components\Renovation;

use Illuminate\View\Component;
use Illuminate\View\View;

class TextareaInput extends Component
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
        public ?int $maxlength = 2000,
        public int $rows = 5
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.renovation.textarea-input');
    }
}
