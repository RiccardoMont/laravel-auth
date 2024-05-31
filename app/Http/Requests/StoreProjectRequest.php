<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', Rule::unique('projects')],
            'type_id' => 'nullable|exists:types,id',
            'user_id' => 'nullable|exists:users,id',
            'technologies' => 'exists:technologies,id',
            'languages_and_frameworks' => 'required|max:100',
            'objectives' => 'nullable',
            'cover_images' => 'nullable|image|max:500'
        ];
    }
}
