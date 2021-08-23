<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    //
    public function news(){
        return $this->belongsTo('App\News');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
