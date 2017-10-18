<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $title = 'My_Blog';
    
    public function index()
    {
        $date = resolve('Data');
        
        return view('layouts.primary', [
            'page'=> 'pages.main',
            'title'=> $this->title,
            'date'=> $date->data()            
        ]);
    }
    
    public function notFoundPage()
    {
        return view ('404');
    }
    
      
       
}
