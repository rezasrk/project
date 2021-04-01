<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalNumberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['required'],
            'number' => ['required'],
            'year' => ['required', 'min:4', 'max:4'],
        ];
    }
}
