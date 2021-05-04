<?php

namespace App\Http\Requests\Front;

use App\Models\Publisher;
use Illuminate\Foundation\Http\FormRequest;

class JournalRequest extends FormRequest
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
            'journal_title' => ['required'],
            'publisher' => ['required', function ($attr, $value, $fail) {
                $publisher = Publisher::query()
                    ->where('creator_id',auth('front')->id())
                    ->where('id', $value)->where('status', 1)->first();
                if (!$publisher) {
                    return $fail('این نشریه توسط ادمین تایید نشده است!');
                }
            }],
            'category_id' => ['required'],
            'degree' => ['required'],
            'period_journal' => ['required'],
            'about_journal' => ['required'],
            'owner_journal' => ['nullable'],
            'manager' => ['nullable'],
            'chief_editor' => ['nullable'],
            'editorial_board' => ['nullable'],
            'p_issn' => ['nullable'],
            'e_issn' => ['nullable'],
            'post_code' => ['nullable'],
            'address' => ['nullable'],
            'phone' => ['nullable'],
            'fax' => ['nullable'],
            'email' => ['nullable'],
            'website' => ['nullable'],
            'image' => ['nullable'],
        ];
    }
}
