<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Sadala;
use App\Comment;
use Image;
use Illuminate\Support\Facades\Storage;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::orderBy('created_at', 'desc')->get();
        $sadalas = sadala::all();


        return view('admins.admin_posts')->with(['sadalas' => $sadalas,
            'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sadalas = sadala::all();

        
        return view('admins.create_form')->with(['sadalas'=>$sadalas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $this->validate($request, [
            'title' => 'required|max:50',
            'anotation' => 'required|max:150',
            'author' => 'required',
            'anotation'=>'required',
            'sadala' => 'required',
            'body' => 'required|max:400'
        ]);
   
           
        $post=new Post;
        $post->title=$request->input('title');
        $post->anotation=$request->input('anotation');
        $post->author=$request->input('author');
        $post->sadala=$request->input('sadala');
        $post->body=$request->input('body');
        if (empty($request->file('file'))) {
           // $trumb = Image::make(public_path('/app/public/lot.jpg'))->resize(300, 200);
            $trumb='images/700x450/lot.jpg';
            $articlepic='images/700x450/lot.jpg';
            //dd($articlepic);
             $post->trumbnail = $trumb;
         $post->articlepic =$articlepic;
                   
//     $post->trumbnail = 'images/700x450/'.$trumbname;
//         $post->articlepic = 'images/900x300/'.$articlepicname;
        } else   {    
            $trumb=$post->trumbnail=$request->file('file');
            $articlepic=$post->trumbnail=$request->file('file');
        $articlepicname=time() . '_articlepicname.' . $trumb->getClientOriginalExtension();
        $articlepicpath=public_path('images/900x300/' . $articlepicname);
         $trumbname  = time() . '_trumbnail.' . $trumb->getClientOriginalExtension();
         $trumbpath = public_path('images/700x450/' . $trumbname);
         Image::make($trumb->getRealPath())->resize(100, 100)->save($trumbpath);
         Image::make($articlepic->getRealPath())->resize(900, 300)->save($articlepicpath);
         $post->trumbnail = 'images/700x450/'.$trumbname;
         $post->articlepic = 'images/900x300/'.$articlepicname;
         }
        
         
           $post->save();
       
        return redirect('/admin')->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $show = Post::find($id);
        $comments = Comment::withTrashed()->where('post_id', $id)->get();
        return view('admins.article_show')->with(['show' => $show,

            'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $post = Post::find($id);
        $sadalas = sadala::all();

        return view('admins.article_edit')->with(['posts'=>$post, 'sadalas'=>$sadalas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
         $this->validate($request, [
            'title' => 'required|max:50',
            'anotation' => 'required|max:150',
            'author' => 'required',
            'sadala' => 'required',
            'body' => 'required|max:400'
        ]);
         
          if (empty($request->file('file'))) {
           // $trumb = Image::make(public_path('/app/public/lot.jpg'))->resize(300, 200);
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
        
// dd($id);
         // $tmp=Post::find($id);
         // dd($tmp);
         Post::where('id', $request->id)->update([
        'title'=>$request->input('title'),
        'anotation'=>$request->input('anotation'),
       'author'=>$request->input('author'),
        'sadala'=>$request->input('sadala'),
        'body'=>$request->input('body'),
         'trumbnail'=>$trumbnail,
          'articlepic'=>$articlepic
             
         ]);
        return redirect('/admin')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post=Post::find($id);
       $post->delete();
       return redirect('/admin')->with('success', 'Post deleted!');
       
    }
}
