<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
    public function rules(): array
    {
        $user = auth()->guard('front')->id();
        return [
            'name' => ['required','max:100'],
            'username'=>['required','max:100','unique:users,username,'.$user.',id'],
            'email' => ['nullable','unique:users,email,'.$user.',id'],
            'degree' => ['nullable','exists:baseinfos,id,type,degree'],
            'scientific_rank'=>['nullable','exists:baseinfos,id,type,scientific_rank']
        ];
    }
}
