<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:skills',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'] = 'required|string|max:255|unique:skills,name,' . $this->skill->id;
        }

        return $rules;
    }
}
