<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Users(){
        return $this->belongsToMany('App\User');
    }
}
