<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName(){
        return 'name';
    }
}
 