<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Includes\Classes\FormatData;

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
    
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')
            ->where('is_active', 1)
            ->withCount('tags')
            ->withCount('comments')
            ->withCount('categories')
            ->get();
        
        return view('layouts.primary', [
            'page'=> 'pages.main',
            'title'=> $this->title,
            'data' => $this->data,
            'posts' => $posts,
        ]);
    }
    
    public function notFoundPage()
    {
        return view ('404');
    }
    
      
       
}
