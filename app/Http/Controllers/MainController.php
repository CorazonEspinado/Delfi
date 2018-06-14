<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Sadala;
use App\Comment;

class MainController extends Controller
{
    public function Main()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        $sadalas=sadala::all();
//        $tmp  = Post::find(29);
//        $tmp1 = $tmp->sadalas;
//         $tmp2 = $tmp1->sadala_name;
//         dd($tmp2); 
//        foreach ($posts->sadalas as $post) {
//    echo $post->sadalas;
//        dd($posts->sadalas);
//        dd($posts);
//}
     


        
            return view('users.posts')->with(['posts' =>$posts, 'sadalas'=>$sadalas]);
    }
    public function sadalaShow($id)
    {
        
        $sadalas = sadala::all();
        $sadalas_posts = Post::where('sadala_id', $id)->get();
      
        return view('users.posts')->with(['posts' => $sadalas_posts,
            'sadalas' => $sadalas]);

    }

    public function CommentStore(Request $request, $id, $ip)
    {
///
    }
    public function articleShow($id)
    {
        $show=Post::find($id);
        $sadalas=sadala::all();
      
    return view ('users.show')->with(['posts'=>$show,
        'sadalas'=>$sadalas]);
    }

}
