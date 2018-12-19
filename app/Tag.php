<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // connecting with the Post model [n:m relation]
    public function posts() {
        // return $this->belongsToMany('connecting_model', 'name_of_intermediate_table', 'this_model_key', 'foreign_key');
        return $this->belongsToMany('App\Post', 'post_tag');
    }
}
