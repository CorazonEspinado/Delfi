<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Sadala;
use App\Comment;
use App\Visit;


class MainController extends Controller
{
     public function __construct()
    {
      
    }
    public function Main()
    {
          $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
  elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  else $browser = "Неизвестный";  
  $ip=$_SERVER['REMOTE_ADDR'];
//  $visit->browser=$browser;
  Visit::Create([
      'ip'=>$ip,
      'browser'=>$browser
  ]); 
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
