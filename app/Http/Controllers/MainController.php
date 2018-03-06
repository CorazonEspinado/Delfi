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
        $sadalas = sadala::all();


        return view('users.posts')->with(['sadalas' => $sadalas,
            'posts' => $posts]);
    }


    public function sadalaShow($sadala_name)
    {
        $sadalas = sadala::all();


        $sadalas_posts = Post::where('sadala', $sadala_name)->get();

        return view('users.posts')->with(['posts' => $sadalas_posts,
            'sadalas' => $sadalas]);

    }

    public function CommentStore(Request $request, $id, $ip)
    {

return ('a');
        
    }
    public function articleShow($id)
    {
        $show=Post::find($id);
        $sadalas=sadala::all();
        $comments=Comment::withTrashed()->where('post_id', $id)->get();

    return view ('users.show')->with(['show'=>$show,
        'sadalas'=>$sadalas,
        'comments'=>$comments]);
    }

}
