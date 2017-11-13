<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Includes\Classes\CurrentData;

class PageController extends MainController
{
    public function feedBack(){
        $this->title = 'Обратная связь';

        return view('layouts.primary', [
            'page'=>'pages.feedback',
            'title'=> $this->title
        ]);
    }
    
    public function contacts(){
        $this->title = 'Контакты';

        return view('layouts.primary', [
            'page'=>'pages.contacts',
            'title'=> $this->title
        ]);
    }
    
    public function about(){
        $this->title = 'Обо мне';

        return view('layouts.primary', [
            'page'=>'pages.about',
            'title'=> $this->title,
            
        ]);
    }
}
