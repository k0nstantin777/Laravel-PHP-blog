<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function _list()
    {
        $categories = Category::all();
        $categories = $categories->map(function($cat, $key){
            $cat['postsCount'] = $cat->posts()->count(); 
            return $cat;
        });
        
        return json_encode($categories);
    }
}
