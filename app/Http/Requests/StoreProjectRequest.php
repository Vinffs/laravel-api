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
            'title' => ['required', 'min:3', 'max:100', 'unique:projects'],
            'description' => ['nullable'],
            'image' => 'required',
            'thumb' => 'nullable',
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['exists:technologies,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Project title is required.',
            'title.min' => 'Project title must be at least :min characters.',
            'title.max' => 'Project title may not be greater than :max characters.',
            'title.unique' => 'Project title already exists.',
            'image.required' => 'Project image is required.',

        ];
    }
}
