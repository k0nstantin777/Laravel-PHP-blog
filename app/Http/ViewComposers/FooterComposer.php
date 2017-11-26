<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class FooterComposer
{
    /**
     * Create a new Footer composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $comments = Cache::remember('comments', env('CACHE_TIME', 0), function(){
            return Comment::with('post')->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
        });
        $view->with('comments', $comments);
       
        $archives = Cache::remember('archives', env('CACHE_TIME', 0), function(){
            return Post::orderBy('created_at', 'desc')
                        ->actual()
                        ->select(DB::raw('DISTINCT MONTHNAME(created_at) AS month, YEAR(created_at) AS year'))
                        ->get();
        });    
        $view->with('archives', $archives);
        
    }
}
