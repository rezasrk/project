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
            'from_page' => ['required'],
            'to_page' => ['required'],
            'writers' => ['required'],
            'key_word' => ['required'],
            'category_first_id' => ['required'],
            'category_second_id' => ['required'],
            'category_third_id' => ['required'],
            'category_forth_id' => ['required'],
            'article_summery' => ['required'],
            'attachment' => ['required'],
        ];
    }
}
