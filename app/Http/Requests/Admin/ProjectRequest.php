<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true; 
    }

  
    public function rules(): array
    {
        $rules = [
            'project_category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'property_type' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'surface_area' => 'nullable|string|max:255',
            'condition_before' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'cost_currency' => 'nullable|string|max:10',
            'duration_weeks' => 'nullable|integer|min:0',
            'completion_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
            'co2_avoided_per_year' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'architect_name' => 'nullable|string|max:255',
            'contractor_name' => 'nullable|string|max:255',
            'materials_used' => 'nullable|string',
            'challenges' => 'nullable|string',
            'result_highlights' => 'nullable|string',
            'experts' => 'nullable|array',
            'experts.*' => 'exists:experts,id',
            'expert_roles' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if ($this->isMethod('post')) {
           
            $rules['cover_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
           
            $rules['cover_image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }
}
