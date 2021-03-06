<?php

namespace App;

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


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */



    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }
}
