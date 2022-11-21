<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Worksome\RequestFactories\Concerns\HasFactory;

class SignInFormRequest extends FormRequest
{
    use HasFactory;

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
