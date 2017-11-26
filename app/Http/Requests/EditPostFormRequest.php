<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Post;

class EditPostFormRequest extends FormRequest
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
        $post = Post::find(session('post_id'));
                
        return [
            'title' => 'required|max:255|min:3', Rule::unique('posts')->ignore($post->id),
            'announce' => 'required',
            'fulltext' => 'required',
            'user_id' => 'required|in:'.Auth::user()->id,
            'post_id' => 'required|in:'.$post->id,
            'active_from' => 'date|nullable',
            'active_to' => 'date|nullable',
            'image' => 'image',
            'tag.*' => 'min:3|max:15'
        ];
    }
}
