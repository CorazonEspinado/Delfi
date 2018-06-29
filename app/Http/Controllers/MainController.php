<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Sadala;
use App\Comment;


class MainController extends Controller
{
     public function __construct()
    {
      $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
  elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  else $browser = "Неизвестный";  
   
    }
    public function Main()
    {
           
        $posts = Post::orderBy('created_at', 'desc')->get();
        $sadalas=sadala::all();
        return view('users.posts')->with(['posts' =>$posts, 'sadalas'=>$sadalas]);
    }
    public function sadalaShow($id)
    {
           $sadalas = sadala::all();
        $sadalas_posts = Post::where('sadala_id', $id)->get();
      
        return view('users.posts')->with(['posts' => $sadalas_posts,
            'sadalas' => $sadalas]);
    }
  
    public function articleShow($id)
    {
        
        $show=Post::find($id);
        $sadalas=sadala::all();
        return view ('users.show')->with(['posts'=>$show,
        'sadalas'=>$sadalas]);
        
    }

}
