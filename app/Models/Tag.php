<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    /**
     * The posts that belong to the tags.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
