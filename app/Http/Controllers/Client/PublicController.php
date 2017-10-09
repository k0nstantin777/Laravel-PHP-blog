<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class PublicController extends MainController
{
    public function response()
    {
        return 'Response Public page';
    }
}
