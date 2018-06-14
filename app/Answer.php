<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    
   protected $fillable=['answer_author', 'comment_id','post_id', 'answer_text'];
}
