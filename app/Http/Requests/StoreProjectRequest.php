<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'unique:projects', 'max:50', 'string'],
            'project_img' => ['nullable', 'image', 'max:2048'],
            'description' => ['max:400'],
            'tools' => ['max:80','string'],
            'type' => ['max:90'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }
}
