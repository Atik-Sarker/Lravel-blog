<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{

    public function GetRouteKeyName(){
        return 'slug';
    }
}
