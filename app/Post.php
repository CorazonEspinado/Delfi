<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['title', 'anotation', 'author', 'sadala', 'body', 'trumbnail', 'articlepic'];
}
