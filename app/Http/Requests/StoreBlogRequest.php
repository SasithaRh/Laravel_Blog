<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'blog_category_id' => 'required',
            'user_id' => 'exists:users,id',
            'blog_title' => 'required|string|max:500|min:3',
            'blog_image' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',


        ];
    }
}
