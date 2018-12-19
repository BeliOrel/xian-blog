<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {
        // we connect this model with Category model
        return $this->belongsTo('App\Category');
    }
}
