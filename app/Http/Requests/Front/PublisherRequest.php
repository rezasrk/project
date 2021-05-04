<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        return [
            'title' => ['required','max:100'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['nullable'],
            'web_site' => ['nullable'],
            'about' => ['nullable'],
            'license'=>[$this->get('publisher_id') ? '' : 'required'],
            'letter'=>[$this->get('publisher_id') ? '' : 'required'],
            'imamge'=>['nullable']
        ];
    }
}
