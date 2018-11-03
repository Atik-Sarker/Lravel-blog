<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'slug','tag', 'body', 'status', 'posted_by', 'image',
    ];

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tags')->withTimestamps();
    }
    public function categories(){
        return $this->belongsToMany('App\category','category_posts')->withTimestamps();
    }
    public function GetRouteKeyName(){
        return 'slug';
    }
}
