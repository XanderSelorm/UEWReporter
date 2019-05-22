<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';


    //Model Relationships

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function getRouteKeyName(){
        return 'name';
    }
}
 