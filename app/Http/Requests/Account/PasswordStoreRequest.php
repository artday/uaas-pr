<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class PasswordStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_current' => 'required|is_current_password',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'is_current_password' => 'Your current password is incorrect',
        ];
    }
}
