<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegisterRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'email' => 'required|unique:users|email|max:255',
            'pass' => 'required|max:40|min:6',
            'pass_repeat' => 'required|same:pass',
            'phone' => 'regex:/\+\d{1}\s{1}\(\d{3}\)\s{1}\d{3}\-\d{2}\-\d{2}/',
            'is_confirm' => 'accepted'
        ];
    }
}
