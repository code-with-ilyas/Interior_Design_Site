<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true; 
    }

   
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        return $rules;
    }
}
