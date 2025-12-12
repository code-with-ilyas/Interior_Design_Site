<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // We're using policies for authorization
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0',
            'bio' => 'nullable|string',
            'company' => 'nullable|string|max:255',
            'company_url' => 'nullable|url|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|exists:expert_categories,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ];

        if ($this->isMethod('post')) {
            // Create validation
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
            // Update validation
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Ensure category_id is a single value, not an array
        if (is_array($this->category_id)) {
            $this->merge([
                'category_id' => $this->category_id[0] ?? null,
            ]);
        }
    }
}
