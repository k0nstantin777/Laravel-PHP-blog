<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\EditPostFormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CommentFormRequest;
use App\Includes\Classes\Uploader;


class PostController extends MainController
{
    
    public function index(Request $request)
    {
        $posts = Post::with('user', 'tags', 'categories', 'comments')
                    ->orderBy('created_at', 'DESC')
                    ->actual()
                    ->paginate(4);
                       
        return view('layouts.primary', [
            'page'=> 'pages.main',
            'title'=> $this->title,
            'data' => $this->data,
            'posts' => $posts,
        ]);
    }
       
    /**
     * Страница поста
     * @param object $post
     * @return string
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
    
    /**
     * Посты по категории
     * @param object $cat
     * @return string
     */
    public function postsByCat ($cat)
    {
        $this->title = $cat->name;
        $this->viewsCountAdd($cat);
        $posts = $cat->posts()
            ->orderBy('created_at', 'desc')
            ->actual()
            ->paginate(4);
        
        return view('layouts.primary', [
            'page'=> 'pages.category',
            'title' => $this->title,
            'posts' => $posts,
            'data' => $this->data,
            'cat' => $cat
        ]);
    }
    
    /**
     * Посты по тегу 
     * @param string $name
     * @return string
     */
    public function postsByTag ($name)
    {
        $tag = Tag::where('name', $name)->first();
        $this->title = 'Посты по тегу: '.$tag->name;
      
        $posts = $tag->posts()->orderBy('created_at', 'desc')
            ->where('is_active', 1)
            ->actual()
            ->paginate(4);
        
        return view('layouts.primary', [
            'page'=> 'pages.tag',
            'title' => $this->title,
            'posts' => $posts,
            'data' => $this->data,
            'tag' => $tag
        ]);
    }
    
    /**
     * Посты сгруппированные по дате:месяц,год
     * @param string $date
     * @return string
     */
    public function postsByDate ($date)
    {
        $this->title = 'Архив';
        
        $posts = Post::actual()
            ->whereMonth('created_at', date('m', strtotime($date)))
            ->whereYear('created_at', date('Y', strtotime($date)))
            ->paginate(4);
        
        return view('layouts.primary', [
            'page'=> 'pages.archive',
            'title' => $this->title,
            'posts' => $posts,
            'archive' => $date,
            'data' => $this->data,
        ]);
        
        
    }
    
    /**
     * Страниа создания поста
     * @return string
     */
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
    
    /**
     * Обработка формы создания поста
     * @param PostFormRequest $request
     * @param Uploader $uploader
     * @return void
     */
    public function createPost(PostFormRequest $request, Uploader $uploader)
    {
        
        if (Gate::denies('post_create')) {
            abort(403);
        }
                
        $tags = $this->getTags($request->input('tags.*'));
        
        $post = Post::create([
                        'user_id' => $request->input('user_id'),
                        'title' => $request->input('title'),
                        'image' => $uploader->processUpload($request),
                        'slug' => url_slug($request->input('title')),
                        'announce' => $request->input('announce'),
                        'fulltext' => $request->input('fulltext'),
                        'active_from' => $request->input('active_from') !== null ? $request->input('active_from') : Carbon::now(),
                        'active_to' => $request->input('active_to'),
                   ]);
        
        $post->categories()->attach([$request->input('category')]);
        $post->tags()->attach($tags);
       
        return redirect()
            ->route('mainPage')
            ->with('action', 'Пост добавлен');
    }
    
    /**
     * Страница удаления поста
     * @param object $post
     * @return string
     */
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
    
    /**
     * Обработка формы редактирования поста
     * @param object $post
     * @param EditPostFormRequest $request
     * @param Uploader $uploader
     * @return void
     */
    public function editPost($post, EditPostFormRequest $request, Uploader $uploader)
    {
        $this->authorize('edit', $post);
        
        $tags = $this->getTags($request->input('tags.*'));
        
        $post->update([
                        'user_id' => $request->input('user_id'),
                        'title' => $request->input('title'),
                        'image' => $uploader->processUpload($request),
                        'slug' => url_slug($request->input('title')),
                        'announce' => $request->input('announce'),
                        'fulltext' => $request->input('fulltext'),
                        'active_from' => $request->input('active_from') !== null ? $request->input('active_from') : Carbon::now(),
                        'active_to' => $request->input('active_to'),
                ]);
        
        $post->tags()->sync($tags);
        try{
            $post->categories()->attach([$request->input('category')]);
        } catch (\Exception $e){}    
            
        return redirect()
            ->route('mainPage')
            ->with('action', 'Пост обновлен');
    }
    
    /**
     * Удаление поста
     * @param object $post
     * @return void
     */
    public function delete($post)
    {
        $this->authorize('delete', $post);
        
        $post->where('id',$post->id)->delete();
        
        return redirect()
            ->route('mainPage')
            ->with('action', 'Пост удален');
    }
    
    /**
     * Обработка формы создания комментария
     * @param CommentFormRequest $request
     * @return void
     */
    public function createComment(CommentFormRequest $request)
    {
        $post = Post::find(session('post_id'));
               
        $post->comments()->create([
            'title' => $request->input('title'),
            'slug'=> url_slug($request->input('title')),
            'comment' => $request->input('comment'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
               
        ]);
        
        return redirect()
            ->route('post.show', $post->slug)
            ->with('comment_add_success', 'Комментарий добавлен!');
    }
    
    /**
     * Счетчик просмотров
     * @param object $object
     */
    private function viewsCountAdd ($object)
    {
        $object->update(['views_count' => $object->views_count + 1]); 
    }
    
    private function getTags($tags)
    {
        $arr_tags = '';
        for ($i=0; $i< count($tags); $i++){
            $tag = Tag::firstOrCreate([
                'name' => $tags[$i],
            ]);
            $arr_tags[] = $tag->id; 
        }
        return $arr_tags; 
    }
               
}
