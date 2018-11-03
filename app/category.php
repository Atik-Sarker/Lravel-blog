<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];
    public function posts(){
        return $this->belongsToMany('App\Post','category_posts')->orderBy('created_at', 'DESC')->paginate(2);
    }
    public function GetRouteKeyName(){
        return 'slug';
    }

}
