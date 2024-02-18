<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'min:3'],
            'email' => ['required' , 'email', 'string', 'unique:users'],
            'firstname' => ['string', 'nullable'],
            'lastname' => ['string', 'nullable'],
            'fathername' => ['string', 'nullable'],
            'gender' => ['string', 'nullable', 'in:мужчина,женщина'],
            'password' => ['string', 'min:6', 'required', 'confirmed'],
            'phone' => ['string', 'min:6', 'phone']
        ];
    }

    public function messages(): array
    {
        return [
            //TODO: Сделать сообщения на русском
            'gender.in' => 'Пол может быть только мужчина или женщина',
        ];
    }
}
