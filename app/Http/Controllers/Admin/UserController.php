<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class UserController extends AdminController
{
    public function index()
    {
        return "Admin User Index";
    }
    
    public function one($id)
    {
        return "Admin User One: " . $id;
    }    
    
    public function add()
    {
        return "Admin User Add";
    }
    
    public function edit($id)
    {
        return "Admin User Edit: " . $id;
    }
    
    public function delete($id)
    {
        return "Admin User Delete: " . $id;
    }
    
    
}
