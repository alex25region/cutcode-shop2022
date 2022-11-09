<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpFormRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        // правила валидации для регистрации:
        return [
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::default()],
        ];
    }

    // обработка до валидации:
    public function prepareForValidation ()
    {
        $this->merge([
            'email' => str(request('email'))->squish()->lower()->value()
//                ->squish()  // удаляет все whitespace
//                ->lower()   // переводит в нижний регистр
//                ->value()   // вернет строку, вместо объекта
        ]);
    }
}
