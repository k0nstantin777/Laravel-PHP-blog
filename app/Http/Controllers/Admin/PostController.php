<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class PostController extends AdminController
{
    public function index()
    {
        return "Admin Post Index";
    }
    
    public function one($id)
    {
        return "Admin Post One: " . $id;
    }
    
    public function add()
    {
        return "Admin Post Add";
    }
    
    public function edit($id)
    {
        return "Admin Post Edit: " . $id;
    }
    
    public function delete($id)
    {
        return "Admin Post Delete: " . $id;
    }
}
