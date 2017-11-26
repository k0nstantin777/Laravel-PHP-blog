<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppComposer
{
    /**
     * Create a new App composer.
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
        $user = Auth::user();
            
        if (!Auth::check()){
            $currentUser = false ;
            $ip = '';
        } else {
            $currentUser = $user;
            $ip = getIp();
        }
            
        $view->with('currentUser', $currentUser);
        $view->with('ip', $ip);
        
    }
}
