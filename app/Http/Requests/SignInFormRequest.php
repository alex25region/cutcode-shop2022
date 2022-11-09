<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInFormRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        // правила авторизации (вход):
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }
}
