<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function posts(){
        return $this->belongsToMany('App\Post');
    }

    // public function users(){
    //     return $this->belongsToMany(User::class);
    // }

    public function getRouteKeyName(){
        return 'name';
    }
}
 