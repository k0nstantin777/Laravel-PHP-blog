<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get the profile record associated with the user.
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    
    /**
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    
    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
