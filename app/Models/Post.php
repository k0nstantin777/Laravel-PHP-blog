<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
    use SoftDeletes;

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
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
