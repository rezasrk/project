<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalRequest extends FormRequest
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
            'journal_title'=>['required'],
            'owner_journal'=>['required'],
            'requester'=>['required'],
            'rank_requester'=>['required'],
            'degree_journal'=>['required'],
            'license_from'=>['required'],
            'journal_phone'=>['required'],
            'journal_email'=>['required'],
            'journal_web_site'=>['required'],
            'journal_logo'=>['nullable'],
            'journal_license_image'=>['nullable'],
            'journal_letter'=>['nullable'],
        ];
    }
}
