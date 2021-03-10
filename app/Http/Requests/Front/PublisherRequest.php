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
            'publisher_title'=>['required'],
            'owner_publisher'=>['required'],
            'requester'=>['required'],
            'rank_requester'=>['required'],
            'degree_publisher'=>['required'],
            'license_from'=>['required'],
            'publisher_phone'=>['required'],
            'publisher_email'=>['required'],
            'publisher_web_site'=>['required'],
            'publisher_logo'=>['nullable'],
            'publisher_license_image'=>['nullable'],
            'publisher_letter'=>['nullable'],
        ];
    }
}
