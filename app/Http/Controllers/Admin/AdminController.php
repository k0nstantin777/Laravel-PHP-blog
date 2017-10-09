<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class AdminController extends MainController
{
    public function response()
    {
        return 'Response Admin page';
    }
}
