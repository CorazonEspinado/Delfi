<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    public function answers()
    {
         
        return $this->hasMany('App\Answer');
    }
    use SoftDeletes;
    protected $fillable=['name', 'comment', 'post_id', 'ip', 'deleted_at'];
}
