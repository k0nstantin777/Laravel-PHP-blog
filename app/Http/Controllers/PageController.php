<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedBackFormRequest;
use App\Events\FeedbackCreated;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;

class PageController extends MainController
{
    /**
     * Страница обратной связи 
     * @return string
     */
    public function feedBack(){
        $this->title = 'Обратная связь';

        return view('layouts.primary', [
            'page'=>'pages.feedback',
            'title'=> $this->title
        ]);
    }
    
    /**
     * Обработка формы обратной связи
     * @param FeedBackFormRequest $request
     * @return void
     */
    public function feedBackPost(FeedBackFormRequest $request){
                
        event(new FeedbackCreated($request->all()));
                        
        return redirect()
                ->route('feedBackPage')
                ->with('message', 'Сообщение отправлено!');
    }
    
    /**
     * Страница Контакты
     * @return string
     */
    public function contacts(){
        $this->title = 'Контакты';

        return view('layouts.primary', [
            'page'=>'pages.contacts',
            'title'=> $this->title
        ]);
    }
    
    /**
     * Страница Обо мне
     * @return string
     */
    public function about(){
        $this->title = 'Обо мне';

        return view('layouts.primary', [
            'page'=>'pages.about',
            'title'=> $this->title,
            
        ]);
    }
    
    /**
     * Страница категорий статей
     * @return string
     */
    public function categories(){
        $categories = Cache::remember('categories', env('CACHE_TIME', 0), function(){
                return Category::with('posts')->orderBy('name', 'ASC')->get();
        });
                
        return view('layouts.primary', [
            'page'=>'pages.categories',
            'title'=> 'Категории',
            'categories' => $categories
        ]); 
    }
}
