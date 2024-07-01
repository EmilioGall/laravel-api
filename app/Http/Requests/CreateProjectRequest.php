<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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

            'title' => ['required', 'min:3'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],
            'description' => ['min:20']

        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [

            'title.required' => 'The title can not be empty! Please insert a valid title.',
            'title.min:3' => 'The title can not be less than 3 digits! Please insert a valid title.',
            'description.min:20' => 'The description can not be less than 20 digits! Please insert a valid description.',

        ];
    }
}
