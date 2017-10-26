<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $title = 'My_Blog';
    
    public function index()
    {
               
        return view('layouts.primary', [
            'page'=> 'pages.main',
            'title'=> $this->title,
        ]);
    }
    
    public function notFoundPage()
    {
        return view ('404');
    }
    
      
       
}
