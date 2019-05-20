<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //Table Name
    protected $table = 'posts';

    // Setup fields of table "posts"
    protected $fillable = ['id', 'title', 'slug', 'body', 'cover_image', 'user_id', 'category_id'];

    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function scopeFilter($query, $filters){
        if (isset($filters['month'])){
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
         }
 
        if (isset($filters['year'])){
            $query->whereYear('created_at',  $filters['year']);
         } 
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
       ->groupBy('year', 'month')
       ->orderByRaw('max(created_at) desc')
       ->get()
       ->toArray();
    }


    //Model Relationships

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag', 'id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
