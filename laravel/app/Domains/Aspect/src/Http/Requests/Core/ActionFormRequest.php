<?php

namespace Aspect\Http\Requests\Core;

use Illuminate\Foundation\Http\FormRequest;

class ActionFormRequest extends FormRequest
{
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
            'data' => ['array'],
            'aspect_id' => ['integer', 'exists:aspects,id'],
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
