<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends MainController
{
    
    public function categories(){
        $this->title = 'Категории';

        return view('layouts.primary', [
            'page'=>'pages.categories',
            'title'=> $this->title
        ]);
    }
        
    public function show($id)
    {
        $date = resolve('FormatData');
        
        return view('layouts.secondary', [
            'page'=> 'pages.post',
            'title' => $this->title,
            'date' => $date->timeNow()
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
}
