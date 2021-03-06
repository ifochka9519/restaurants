<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends \Eloquent
{
    protected $fillable =[
        'name','short_description','description'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_restaurants', 'restaurant_id', 'category_id')->withTimestamps();

    }
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }
    public function marks()
    {
        return $this->hasMany('App\Mark');
    }
    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
