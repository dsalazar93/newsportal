<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function news_category(){
        return $this->hasMany('App\NewsCategory');
    }
}
