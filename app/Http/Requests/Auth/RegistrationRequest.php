<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed']
        ];
    }

    /**
     * Get user registration dto instance
     *
     * @return RegistrationData
     */
    public function getInputData(): RegistrationData
    {
        return new RegistrationData(
            $this->input('name'),
            $this->input('email'),
            bcrypt($this->input('password')),
        );
    }
}