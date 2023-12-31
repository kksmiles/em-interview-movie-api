<?php

namespace App\Http\Requests\UserController;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone_no' => ['required', 'string', 'unique:users,phone_no'],
            'category_ids' => ['sometimes', 'array'],
            'category_ids.*' => ['required', 'numeric', 'exists:categories,id'],
            'tag_ids' => ['sometimes', 'array'],
            'tag_ids.*' => ['required', 'numeric', 'exists:tags,id'],
            'movie_ids' => ['sometimes', 'array'],
            'movie_ids.*' => ['required', 'numeric', 'exists:movies,id'],
            'theme_settings' => ['sometimes', 'array'],
        ];
    }

    public function bodyParameters()
    {
        return [
            'name' => [
                'description' => 'The name of the user.',
                'example' => 'John Doe',
            ],
            'email' => [
                'description' => 'The email of the user.',
                'example' => 'johndoe@example.com',
            ],
            'phone_no' => [
                'description' => 'The phone number of the user.',
                'example' => '09 123 456 789',
            ],
            'category_ids.*' => [
                'description' => 'IDs of User favourite categories.',
                'example' => 1,
            ],
            'tag_ids.*' => [
                'description' => 'IDs of User favourite tags.',
                'example' => 1,
            ],
            'movie_ids.*' => [
                'description' => 'IDs of User favourite movies.',
                'example' => 1,
            ],
            'theme_settings' => [
                'description' => 'The theme settings of the user.',
                'example' => [
                    'theme' => 'dark',
                ],
            ],
        ];
    }
}
