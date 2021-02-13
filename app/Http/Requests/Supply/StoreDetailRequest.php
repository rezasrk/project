<?php

namespace App\Http\Requests\Supply;

use App\Models\Supply\Request;
use App\Models\Supply\RequestDetail;
use App\Rules\JalaliDataFormat;
use App\Rules\NumberFormatRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDetailRequest extends FormRequest
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
            'amount.*'=>['nullable','numeric'],
            'price.*'=>['nullable',new NumberFormatRule],
            'unit_price.*'=>['nullable','exists:baseinfos,id,type,money_unit'],
            'date.*'=>['nullable',new JalaliDataFormat]
        ];
    }
}
