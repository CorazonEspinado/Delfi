<?php

namespace App;
use Illuminate\Database\Eloquent\Model;




class Post extends Model
{
    
     public function comments()
    {
         
        return $this->hasMany('App\Comment')->withTrashed();
    }
    
    public function sadalas()
    {
         
         return $this->belongsTo('App\Sadala','sadala_id');
    }
    
    public function answers()
    {
         
        return $this->hasMany('App\Answer', 'post_id')->withTrashed();;
    }

   protected $fillable=['title', 'anotation', 'author', 'sadala_id', 'body', 'trumbnail', 'articlepic'];
   
}
