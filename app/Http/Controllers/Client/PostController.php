<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Client\PublicController;

class PostController extends PublicController
{
    public function index()
    {
        return "Post Index";
    }
    
    public function one($id)
    {
        return "Post One: " . $id;
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
