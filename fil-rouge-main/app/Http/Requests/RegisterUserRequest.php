<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Client,Expert,SuperAdmin',
            'phone_number' => $this->input('role') === 'Client' ? 'required|string' : '',
            'address' => $this->input('role') === 'Client' ? 'required|string' : '',
            'certificate' => $this->input('role') === 'Expert' ? 'required|string' : '',
            'experience' => $this->input('role') === 'Expert' ? 'required|string' : '',
        ];
    }
}
