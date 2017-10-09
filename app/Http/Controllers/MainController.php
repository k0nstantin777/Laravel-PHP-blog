<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class MainController extends Controller
{
    public function mainPage ()
    {
        return view('welcome');
    }
    
    public function notFoundPage()
    {
        return view ('404');
    }
    
    /**
     * Отправка ответа сервера (шаблон, переменные и т.д.)
     */
    abstract public function response();
       
}
