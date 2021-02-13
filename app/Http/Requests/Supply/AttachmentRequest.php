<?php

namespace App\Http\Requests\Supply;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentRequest extends FormRequest
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
            'type' => 'required|exists:baseinfos,id,type,typeAttachment',
            'attachment' => [$this->file_id ? 'nullable' : 'required'],
        ];
    }
}
