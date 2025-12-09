<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpertRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true; 
    }

   
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
            
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
           
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }
}
