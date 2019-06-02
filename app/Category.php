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

    public function users()
    {
        return $this->belongsTo('App\User', 'category_user', 'category_id', 'user_id');
    }

    public function categorySubscriptions()
    {
        return $this->belongsToMany(CategorySubscription::class);
    }
    
    // public function subscribe($userId = null)
    // {
    //     $this->subscriptions()->create([
    //         'user_id' => $userId ?: auth()->id()
    //     ]);
    //     return $this;
    // }
 
    // public function subscriptions()
    // {
    //     return $this->hasMany(CategorySubscription::class);
    // }

    // public function unsubscribe($userId = null)
    // {
    //     $this->subscriptions()
    //         ->where('user_id', $userId ?: auth()->id())
    //         ->delete();
    // }

    // public function getIsSubscribedToAttribute()
    // {
    //     return $this->subscriptions()
    //         ->where('user_id', auth()->id())
    //         ->exists();
    // }
}
