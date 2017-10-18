<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends MainController
{
    public function login()
    {
        return "User Login";
    }
    
    public function registration()
    {
        return "User Reg";
    }
    
    public function logout()
    {
        return "User Loguot";
    }
}
