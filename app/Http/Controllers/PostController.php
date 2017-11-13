<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class PostController extends MainController
{
    
    public function categories(){
        $this->title = 'Категории';

        return view('layouts.primary', [
            'page'=>'pages.categories',
            'title'=> $this->title
        ]);
    }
        
    public function show($id, Request $request)
    {
        $post = Post::find($id);        
        session(['post_id' => $id]);
               
        return view('layouts.secondary', [
            'page'=> 'pages.post',
            'title' => $this->title,
            'post' => $post,
        ]);
    }
    
    public function add()
    {
        return "Post Add";
    }
    
    public function edit($id)
    {
        return "Post Edit: " . $id;
    }
    
    public function delete($id)
    {
        return "Post Delete: " . $id;
    }
    
    public function addComment(Request $request)
    {
        $post = Post::find(session('post_id'));
         
        $this->validate($request, [
            'title' => 'required|max:255',
            'comment' => 'required',
            'post_id' => 'in:'. $post->id,
            'user_id' => 'in:'. Auth::user()->id,
        ]);
        
        $post->comments()->create([
            'title' => $request->input('title'),
            'slug'=> getCommentSlug($request->input('title')),
            'comment' => $request->input('comment'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
               
        ]);
        
        return redirect()
            ->route('post.show', $post->id)
            ->with('comment_add_success', 'Комментарий добавлен!');
    }
    
}
