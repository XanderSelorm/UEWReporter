<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    

    //Model Relationships
    public function post() 
    {
        return $this->hasMany('App\Post');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'category_user', 'category_id', 'user_id');
    }
    
}
