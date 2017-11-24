<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedBackFormRequest;
use App\Events\FeedbackCreated;

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
}
