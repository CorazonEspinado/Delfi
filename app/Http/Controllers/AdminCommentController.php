<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Sadala;
use App\Comment;
use SoftDelete;
use App\Answer;

class AdminCommentController extends Controller
{
   
    public function index()
    {
    }

   public function destroy($commentid, $postid)
    {
        $comment=Comment::find($commentid);
       $comment->delete();
        return redirect()->route('AdminArticleShow', $postid)->with('success', 'Комментарий удалён');;
        }
        
        public function destroyAnswer($commentanswerid, $answerpostid)
    {
       $answer=Answer::find($commentanswerid);
       $answer->delete();
       return redirect()->route('AdminArticleShow', $answerpostid)->with('success', 'Ответ к комментарию удалён');;
        }
         public function AdminCommentStore(Request $request)
    {
             $this->validate($request, [
            'name' => 'required|max:30',
            'comment' => 'required|max:100'
        ]);
        $data = $request->all();
        $comment = new Comment;
        $comment->fill($data);
        $comment->save();
        $request->session()->flash('success', 'Комментарий размещен!');
      return redirect()->route('AdminArticleShow', $request->post_id);
         }
         public function AdminReplyComment($comment_id,$post_id){
            $comment=Comment::find($comment_id);
           $sadalas = sadala::all();
           return view ('admins.adminreplytocomment')->with(
                ['post_id'=>$post_id,
               'comment'=>$comment,
               'sadalas'=>$sadalas]);
       }
       
       public function AdminReplyStore(Request $request)
    {
            $this->validate($request, [
            'replyname' => 'required|max:30',
            'replycomment' => 'required|max:100'
        ]);
        Answer::Create([
            'answer_author'=>$request['replyname'],
            'answer_text'=>$request['replycomment'],
            'comment_id'=>$request['comment_id'],
                'post_id'=>$request['post_id']
        ]);
        $request->session()->flash('success', 'Ответ размещен!');
      return redirect()->route('AdminArticleShow', $request->post_id);
       }
        
}
