<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySubscription extends Model
{
    protected $table = 'category_subscriptions';
 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
