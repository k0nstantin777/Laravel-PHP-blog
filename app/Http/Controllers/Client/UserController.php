<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Client\PublicController;

class UserController extends PublicController
{
    public function login()
    {
        return "User Login";
    }
    
    public function reg()
    {
        return "User Reg";
    }
    
    public function unlogin()
    {
        return "User Unlogin";
    }
}
