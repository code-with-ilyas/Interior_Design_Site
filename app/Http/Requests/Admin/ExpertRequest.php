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
}
