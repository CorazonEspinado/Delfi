<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Sadala;
use App\Comment;
use SoftDelete;
use App\Answer;

class CommentController extends Controller
{
    
    public function store(Request $request, $id)
    {
        
        $code = $request->input('CaptchaCode');
    $isHuman = captcha_validate($code);
    if ($isHuman) {
        $this->validate($request, [
            'name' => 'required|max:30',
            'comment' => 'required|max:100'
            ]);
        $data = $request->all();
        $comment = new Comment;
        $comment->fill($data);
        $comment->save();
        $request->session()->flash('success', 'Комментарий размещен!');
      return redirect()->route('articleShow', $id);
      // TODO: Captcha validation passed, perform protected  action
    } else {
     $request->session()->flash('error', 'Вы бот!'); // TODO: Captcha validation failed, show error message
    return redirect()->route('articleShow', $id);
     }
        }
    
    public function ReplyStore(Request $request)
    {
        
        $code = $request->input('CaptchaCode');
    $isHuman = captcha_validate($code);
    if ($isHuman) {
           $this->validate($request, [
            'replyname' => 'required|max:30',
            'replycomment' => 'required|max:100'
        ]);
        Answer::Create([
            'answer_author'=>$request['replyname'],
            'answer_text'=>$request['replycomment'],
            'comment_id'=>$request['comment_id'],
                'post_id'=>$request['post_id'],
            'ip'=>$request['ip']
        ]);
        $request->session()->flash('success', 'Ответ размещен!');
      return redirect()->route('articleShow', $request->post_id);
       } else {
     $request->session()->flash('error', 'Вы бот!'); // TODO: Captcha validation failed, show error message
    return redirect()->route('articleShow', $request->post_id);
     }
    }
              
       public function ReplyToComment($comment_id,$post_id){
           $comment=Comment::find($comment_id);
           $sadalas = sadala::all();
           return view ('users.replytocomment')->with(
                ['post_id'=>$post_id,
               'comment'=>$comment,
               'sadalas'=>$sadalas]);
       }
}
