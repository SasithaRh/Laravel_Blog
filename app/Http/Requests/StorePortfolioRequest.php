<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'portfolio_name' => 'required|string|max:500|min:3',
            'user_id' => 'exists:users,id',
            'portfolio_string' => 'required|string|max:500|min:3',
             'portfolio_image' => 'required|mimes:jpg,jpeg,png,webp',
            'portfolio_description' => 'required',
            'status' => 'required|boolean',
            ];
    }

             public function messages(): array
{
    return [
        'portfolio_image.mimes:jpg,jpeg,png,webp' => 'Allow to upload only jpg,jpeg,png,webp extensions!',
        // You can add more custom messages here if needed
    ];
}
}
