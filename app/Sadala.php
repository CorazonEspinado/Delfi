<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sadala extends Model
{
   public function Posts()  {
        return $this->hasMany('App\Post');
    }
     protected $fillable=['sadala_name', 'post_id'];
}
