<?php

namespace App\Http\Requests;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'role' => ['required', 'in:admin,user'],
            'gender' => ['required'],
            'password' => ['required', 'confirmed'],
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048']
        ];
    }

    public function messages()
    {
        return [];
    }
}
