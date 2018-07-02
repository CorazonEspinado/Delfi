<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Sadala;
use App\Comment;
use Image;
use Mail;
use App\Subscriber;

use Illuminate\Support\Facades\Storage;


class AdminPostController extends Controller
{
   
    public function index()
    {
         $posts = Post::orderBy('created_at', 'desc')->get();
        $sadalas = sadala::all();
//        Mail::send('admins.emails.newentry', array('key' => 'value'), function($message)
//{
//    $message->to('romans@bmsgroup.eu', 'Джон Смит')->subject('Зашли!');
//});
        return view('admins.admin_posts')->with(['sadalas' => $sadalas,
            'posts' => $posts]);
    }

    public function create()
    {
        $sadalas = sadala::all();
        return view('admins.create_form')->with(['sadalas'=>$sadalas]);
    }

    public function store(Request $request)
    {
            $this->validate($request, [
            'title' => 'required|max:50',
            'anotation' => 'required|max:150',
            'author' => 'required',
            'anotation'=>'required',
            'sadalaid' => 'required',
            'body' => 'required|max:400'
        ]);
        $post=new Post;
        $post->title=$request->input('title');
        $post->anotation=$request->input('anotation');
        $post->author=$request->input('author');
        $post->sadala_id=$request->input('sadalaid');
        $post->body=$request->input('body');
        if (empty($request->file('file'))) {
           // $trumb = Image::make(public_path('/app/public/lot.jpg'))->resize(300, 200);
            $trumb='images/700x450/lot.jpg';
            $articlepic='images/700x450/lot.jpg';
            //dd($articlepic);
             $post->trumbnail = $trumb;
         $post->articlepic =$articlepic;
         } else   {    
            $trumb=$post->trumbnail=$request->file('file');
            $articlepic=$post->trumbnail=$request->file('file');
        $articlepicname=time() . '_articlepicname.' . $trumb->getClientOriginalExtension();
        $articlepicpath=public_path('images/900x300/' . $articlepicname);
         $trumbname  = time() . '_trumbnail.' . $trumb->getClientOriginalExtension();
         $trumbpath = public_path('images/700x450/' . $trumbname);
         Image::make($trumb->getRealPath())->resize(100, 100)->save($trumbpath);
         Image::make($articlepic->getRealPath())->resize(900, 300)->save($articlepicpath);
         $tmp='images/700x450/'.$trumbname;
         $post->trumbnail = 'images/700x450/'.$trumbname;
         $post->articlepic = 'images/900x300/'.$articlepicname;
         }
         $post->save();
            
         $title=$request->input('title');
         $author=$request->input('author');
         $anotation=$request->input('anotation');
         $body=$request->input('body');
         $tmp=post::select('trumbnail')->latest();
         $sadala=post::latest()->first();
         $sadalaname=$sadala->sadalas->sadala_name;
                
         
         Mail::send('admins.emails.newarticle',
             ['title'=>$title, 
             'author'=>$author,
             'anotation'=>$anotation,
             'body'=>$body,
              'sadalaname'=>$sadalaname], 
              function ($message) {
             $subscribers=subscriber::all();
             $last=post::latest()->first();

             
             foreach ($subscribers as $subscriber){
                           
          $message->to($subscriber->email, $subscriber->subscriber)->subject($last->title);
         }
            
        });
         
       
        return redirect('/admin')->with('success', 'Post created!');
    }

    public function show($id)
    {
         $show = Post::find($id);
        $comments = Comment::withTrashed()->where('post_id', $id)->get();
        return view('admins.article_show')->with(['show' => $show,
        'comments' => $comments]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $sadalas = sadala::all();
        return view('admins.article_edit')->with(['posts'=>$post, 'sadalas'=>$sadalas]);
    }

    public function update(Request $request)
    {
             $this->validate($request, [
            'title' => 'required|max:50',
            'anotation' => 'required|max:150',
            'author' => 'required',
            'sadalaid' => 'required',
            'body' => 'required|max:400'
        ]);
            if (empty($request->file('file'))) {
            $trumbnail='images/700x450/lot.jpg';
            $articlepic='images/700x450/lot.jpg';
            } else   {   
            $trumb=$request->file('file');
            $articlepic=$request->file('file');
        $articlepicname=time() . '_articlepicname.' . $trumb->getClientOriginalExtension();
        $articlepicpath=public_path('images/900x300/' . $articlepicname);
         $trumbname  = time() . '_trumbnail.' . $trumb->getClientOriginalExtension();
         $trumbpath = public_path('images/700x450/' . $trumbname);
         Image::make($trumb->getRealPath())->resize(100, 100)->save($trumbpath);
         Image::make($articlepic->getRealPath())->resize(900, 300)->save($articlepicpath);
         $trumbnail = 'images/700x450/'.$trumbname;
         $articlepic = 'images/900x300/'.$articlepicname;
         }
         Post::where('id', $request->id)->update([
        'title'=>$request->input('title'),
        'anotation'=>$request->input('anotation'),
       'author'=>$request->input('author'),
        'sadala_id'=>$request->input('sadalaid'),
        'body'=>$request->input('body'),
         'trumbnail'=>$trumbnail,
          'articlepic'=>$articlepic
         ]);
        return redirect('/admin')->with('success', 'Post updated!');
    }
    public function destroy($id)
    {
       $post=Post::find($id);
       $post->delete();
       return redirect('/admin')->with('success', 'Post deleted!');
       }
       public function AdminSadalaShow($id)
    {
           $sadalas = sadala::all();
        $sadalas_posts = Post::where('sadala_id', $id)->get();
      
        return view('admins.admin_posts')->with(['posts' => $sadalas_posts,
            'sadalas' => $sadalas]);
    }
}
