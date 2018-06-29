<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    use SoftDeletes;
   protected $fillable=['answer_author', 'comment_id','post_id','ip', 'answer_text', 'deleted_at'];
}
