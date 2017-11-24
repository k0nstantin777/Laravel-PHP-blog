<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostFormRequest extends FormRequest
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
            'title' => 'required|max:255|min:3|unique:posts',
            'announce' => 'required',
            'fulltext' => 'required',
            'user_id' => 'required|in:'.Auth::user()->id,
            'active_from' => 'date|nullable',
            'active_to' => 'date|nullable',
            'image' => 'image',
            'tag.*' => 'array'
        ];
    }
}
