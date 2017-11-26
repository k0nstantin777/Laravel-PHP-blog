<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return $this->user()->can('create', Comment::class);
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
            'title' => 'required|max:255',
            'comment' => 'required',
            'post_id' => 'in:'. $post->id,
            'user_id' => 'in:'. Auth::user()->id,
        ];
    }
}
