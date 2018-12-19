<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // you write here (in the Model) if you need to do something
    // that's not conventional
    // you need to explicitly tell what's supposed to be done

    // use 'categories' when dealing with this model
    protected $table = 'categories';
    
    public function posts() {
        // we're connecting it to Post model -> [1:n] connection
        return $this->hasMany('App\Post');
    }
}
