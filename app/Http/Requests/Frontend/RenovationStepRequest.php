<?php

namespace App\Http\Requests\Frontend;

use App\Enums\RenovationCategory;
use App\Services\RenovationFormService;
use Illuminate\Foundation\Http\FormRequest;

class RenovationStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categorySlug = $this->route('categorySlug');
        $stepNumber = $this->route('stepNumber');

        $category = RenovationCategory::fromSlug($categorySlug);
        if (!$category) {
            return ['response' => 'required'];
        }

        $step = $category->getStep($stepNumber);
        if (!$step) {
            return ['response' => 'required'];
        }

        $formService = app(RenovationFormService::class);
        return $formService->getStepValidationRules($step);
    }

    public function messages(): array
    {
        return [
            'response.required' => 'Please provide an answer to continue.',
            'response.*.required' => 'Please select at least one option.',
            'response.min' => 'Please select at least one option.',
            'response.in' => 'Please select a valid option.',
            'response.*.in' => 'Please select valid options.',
            'response.max' => 'Your response is too long.',
        ];
    }
}
