<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StorePasteRequest extends FormRequest
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
            'title' => 'required|max:100',
            'data' => 'required|max:100000',
            'expiration-time' => 'required|json|max:100',
            'syntax' => 'required|max:10',
            'access_type' => [
                'required',
                Rule::in(['public', 'unlisted', 'private']),
            ],
        ];
    }
}
