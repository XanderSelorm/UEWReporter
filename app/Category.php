<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';


    //Model Relationships

    public function post() 
    {
        return $this->hasMany('App\Post', 'id');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'id');
    }
    
}
