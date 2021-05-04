<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required'],
            'article_degree' => ['required'],
            'journal_id' => ['required'],
            'journal_number_id' => ['required'],
            'from_page' => ['nullable'],
            'to_page' => ['nullable'],
            'writers' => ['nullable'],
            'key_word' => ['nullable'],
            'category_first_id' => ['nullable'],
            'category_second_id' => ['nullable'],
            'category_third_id' => ['nullable'],
            'category_forth_id' => ['nullable'],
            'article_summery' => ['nullable'],
            'attachment' => ['nullable'],
        ];
    }
}
