<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function edit(User $user, Post $post)
    {
        if ($user->role->prives->where('name', 'post_edit_all')->first()){
            return true;
        }
        
        if ($user->id === $post->user_id && $user->role->prives->where('name', 'post_edit_own')->first()){
            return true;
        }
        
        return false;
    }
    
    public function delete(User $user)
    {
        return $user->role->prives->where('name', 'post_delete')->first();
    }
}
