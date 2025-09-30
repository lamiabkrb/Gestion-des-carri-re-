<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return[
            'email.required'=>'L\'email est obligatoire',
            'email.email'=>'L\'email doit être une adresse email valide',
            'password.required'=>'Le mot de passe est obligatoire',
            'password.min'=>'Le mot de passe doit contenir au moins 6 caractères',
        ];
    }
}
