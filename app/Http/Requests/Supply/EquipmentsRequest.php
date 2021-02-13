<?php

namespace App\Http\Requests\Supply;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentsRequest extends FormRequest
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
            'equipment_category_id' => ['required', 'exists:categories,id'],
            'equipment_title' => ['required', 'max:50'],
            'equipment_unit' => ['required','exists:baseinfos,id,type,equipment_unit'],
            'equipment_discipline' => ['required','exists:baseinfos,id,type,discipline'],
        ];
    }
}
