<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordProfileRequest extends FormRequest
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
            'password' => ['required'],
            'password_confirm' => ['required', function ($attr, $value, $fail) {
                if ($value != request('password')){
                    return $fail(trans('custom_message.confirm-failed-password'));
                }
            }],
            'password_old' => ['required', function ($attr, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    return $fail(trans('custom_message.invalid-old-password'));
                }
            }],
        ];
    }
}
