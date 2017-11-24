<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    /**
     * Get the user that owns the messages.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
        
}
