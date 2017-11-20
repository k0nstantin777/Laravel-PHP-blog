<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\FormPostRequest;
use App\Http\Requests\FormEditPostRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;


class PostController extends MainController
{
    
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC')
            ->where('is_active', 1)
            ->where('active_from', '<' , Carbon::now())
            ->where('active_to', '>' , Carbon::now())
            ->orWhere('active_to', null)
            ->get();
               
        return view('layouts.primary', [
            'page'=> 'pages.main',
            'title'=> $this->title,
            'data' => $this->data,
            'posts' => $posts,
        ]);
    }
       
    /**
     * Страница поста
     * @param type $id
     * @return type
     */
    public function show($post)
    {
        $this->title = $post->title;
        session(['post_id' => $post->id]);

        $this->viewsCountAdd($post);
       
        return view('layouts.secondary', [
            'page'=> 'pages.post',
            'title' => $this->title,
            'data' => $this->data,
            'post' => $post,
        ]);
    }
    
    public function postsByCat ($cat)
    {
        $this->title = $cat->name;
        $this->viewsCountAdd($cat);
        $posts = $cat->posts()->orderBy('created_at', 'desc')
            ->where('is_active', 1)
            ->where('active_from', '<' , Carbon::now())
            ->where(function($query){
                $query->where('active_to', '>' , Carbon::now())
                      ->orWhere('active_to', null);
            })->get();
        
        return view('layouts.primary', [
            'page'=> 'pages.category',
            'title' => $this->title,
            'posts' => $posts,
            'data' => $this->data,
            'cat' => $cat
        ]);
    }
    
    public function postsByTag ($name)
    {
        $tag = Tag::where('name', $name)->first();
        $this->title = 'Посты по тегу: '.$tag->name;
      
        $posts = $tag->posts()->orderBy('created_at', 'desc')
            ->where('is_active', 1)
            ->where('active_from', '<' , Carbon::now())
            ->where(function($query){
                $query->where('active_to', '>' , Carbon::now())
                      ->orWhere('active_to', null);
            })->get();
        
        return view('layouts.primary', [
            'page'=> 'pages.tag',
            'title' => $this->title,
            'posts' => $posts,
            'data' => $this->data,
            'tag' => $tag
        ]);
    }
    
    public function create()
    {
        if (Gate::denies('post_create')) {
            abort(403);
        }
        
        $this->title = 'Создать пост';
                
        return view('layouts.primary', [
            'page'=> 'pages.create',
            'title' => $this->title,
            'data' => $this->data,
            'cats' => Category::where(['is_active'=> 1])->get(),
            
        ]);
    }
    
    public function createPost(FormPostRequest $request)
    {
        
        if (Gate::denies('post_create')) {
            abort(403);
        }
        
        $post = Post::create([
                        'user_id' => $request->input('user_id'),
                        'title' => $request->input('title'),
                        'image' => '',
                        'slug' => url_slug($request->input('title')),
                        'announce' => $request->input('announce'),
                        'fulltext' => $request->input('fulltext'),
                        'active_from' => $request->input('active_from', Carbon::now()),
                        'active_to' => $request->input('active_to'),
                   ]);
        
        $post->categories()->attach([$request->input('category')]);
       
        return redirect()
            ->route('mainPage')
            ->with('action', 'Пост добавлен');
    }
    
    public function edit($post)
    {
        $this->authorize('edit', $post);
        
        $this->title = 'Изменить пост';
        session(['post_id' => $post->id]);
        
        return view('layouts.primary', [
            'page'=> 'pages.edit',
            'title' => $this->title,
            'post' => $post,
            'data' => $this->data,
            'cats' => Category::where(['is_active'=> 1])->get(),
            
        ]);
    }
    
    public function editPost($post, FormEditPostRequest $request)
    {
        $this->authorize('edit', $post);
        
        $post->update([
                        'user_id' => $request->input('user_id'),
                        'title' => $request->input('title'),
//                        'image' => '',
                        'slug' => url_slug($request->input('title')),
                        'announce' => $request->input('announce'),
                        'fulltext' => $request->input('fulltext'),
                        'active_from' => $request->input('active_from', Carbon::now()),
                        'active_to' => $request->input('active_to'),
                ]);
        
        try{
            $post->categories()->attach([$request->input('category')]);
        } catch (\Exception $e){}    
            
        return redirect()
            ->route('mainPage')
            ->with('action', 'Пост обновлен');
    }
    
    public function delete($post)
    {
        $this->authorize('delete', $post);
        
        $post->where('id',$post->id)->delete();
        
        return redirect()
            ->route('mainPage')
            ->with('action', 'Пост удален');
    }
    
    public function createComment(Request $request)
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
            'slug'=> url_slug($request->input('title')),
            'comment' => $request->input('comment'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
               
        ]);
        
        return redirect()
            ->route('post.show', $post->id)
            ->with('comment_add_success', 'Комментарий добавлен!');
    }
    
 
    private function viewsCountAdd ($object)
    {
        $object->update(['views_count' => $object->views_count + 1]); 
    }
    
        
}
