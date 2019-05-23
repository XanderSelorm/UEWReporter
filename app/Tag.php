<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';


    //Model Relationships

    public function posts(){
        return $this->belongsToMany('App\Post', 'post_tag', 'post_id', 'tag_id');
    }

    public function getRouteKeyName(){
        return 'name';
    }
}
 