<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:200', Rule::unique('types')->ignore($this->type)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least :min characters',
            'name.max' => 'Name must be at most :max characters',
            'name.unique' => 'Name must be unique'
        ];
    }
}
