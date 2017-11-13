<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The posts that belong to the tags.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
