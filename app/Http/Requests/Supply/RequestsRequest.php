<?php

namespace App\Http\Requests\Supply;

use App\Models\Supply\Category;
use App\Models\Supply\Request;
use App\Models\Supply\Store;
use App\Models\Supply\StoreDetail;
use App\Rules\SettingsRule;
use Illuminate\Foundation\Http\FormRequest;

class RequestsRequest extends FormRequest
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
            'subject' => ['required', 'max:100'],
            'applicant_name' => ['nullable', 'max:60'],
            'unit_requester_id' => [new SettingsRule('show_unit_requester', ['true'], 'این مورد الزامی است ')],
            'type' => ['required', 'exists:baseinfos,id,type,type_request'],
            'category_id.*' => ['required', 'exists:categories,id'],
            'amount.*' => ['required', 'numeric'],
            'description.*' => ['nullable', 'max:300'],
        ];
    }
}
