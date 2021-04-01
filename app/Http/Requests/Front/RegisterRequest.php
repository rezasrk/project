<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'unique:users,email'],
            'name' => ['required'],
            'password' => ['required', function ($attr, $value, $fail) {
                if ($value != $this->get('passwordConfirmation')) {
                    return $fail('گذرواژه با تایید گذرواژه ی مطابقت ندارد');
                }
            }],
            'accept_rules' => ['required']
        ];
    }
}
