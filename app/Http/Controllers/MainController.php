<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Includes\Classes\FormatData;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    /**
     * Pages title
     * @var string 
     */
    protected $title = 'My_Blog';
    
    /**
     * FormatData object
     * @var object 
     */
    protected $data;
    
    public function __construct(FormatData $data)
    {
        $this->data = $data;
    }
            
}
