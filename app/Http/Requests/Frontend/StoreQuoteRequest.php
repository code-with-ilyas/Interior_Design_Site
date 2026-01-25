<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'last_name'      => 'required|string|max:255',
            'first_name'   => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:50',
            'company'      => 'nullable|string|max:255',
            'cities'       => 'nullable|string|max:255',
            'address'      => 'nullable|string|max:255',
            'postal_code'  => 'nullable|string|max:20',
            'city'         => 'nullable|string|max:100',
            'country'      => 'nullable|string|max:100',
            'mesage'       => 'nullable|string|max:1500',
        ];
    }

    public function messages(): array
    {
        return [
            'last_name.required'      => 'Last name is required.',
            'first_name.required' => 'First name is required.',
            'email.required'      => 'Email is required.',
            'email.email'         => 'Please enter a valid email address.',
        ];
    }
}
