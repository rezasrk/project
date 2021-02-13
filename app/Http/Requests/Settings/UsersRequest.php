<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'username' => 'required|max:191|unique:users,username,' . $this->user_id . ',id',
            'email' => 'nullable|email|unique:users,email,' . $this->user_id . ',id',
            'password' => [$this->method() == 'POST' ? 'required' : 'nullable', 'min:7', 'max:191'],
            'name' => 'required|max:30|unique:users,name,' . $this->user_id . ',id',
            'roles' => 'required|exists:roles,name',
        ];
    }
}
