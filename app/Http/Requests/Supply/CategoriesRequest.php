<?php

namespace App\Http\Requests\Supply;

use App\Models\Supply\Category;
use App\Rules\UniqueStringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CategoriesRequest extends FormRequest
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
            'category_title.*' => [
                    'required', 'max:70',
                    new UniqueStringRule(
                        'categories',
                        'category_title',
                        ['id'=>$this->route('category')],
                        [ 'category_parent_id'=>$this->category_parent_id]
                    )],
            'discipline_id.*'=>['nullable','exists:baseinfos,id,type,discipline'],
            'unit_id.*'=>['nullable','exists:baseinfos,id,type,equipment_unit'],
        ];
    }
}
