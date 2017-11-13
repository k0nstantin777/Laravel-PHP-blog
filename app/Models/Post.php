<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    /**
     * Get the comment for the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    /**
     * The tags that belong to the posts.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    
    /**
     * The categories that belong to the posts.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
