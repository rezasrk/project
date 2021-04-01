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
            'owner_journal' => ['required'],
            'manager' => ['required'],
            'chief_editor' => ['required'],
            'editorial_board' => ['required'],
            'p_issn' => ['required'],
            'e_issn' => ['required'],
            'post_code' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'fax' => ['required'],
            'email' => ['required'],
            'website' => ['required'],
            'image' => ['nullable'],
        ];
    }
}
