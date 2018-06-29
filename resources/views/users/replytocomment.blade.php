@extends('users.layouts.template')
@section('show_content_reply')

<div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        
                        <h4 class="media-heading">
                           
                        </h4>
                        {{$comment->created_at}}, IP: {{$comment->ip}}
                       <h3>{{$comment->name}}</h3>
                       <h4>{{$comment->comment}}</h4>
                       
          
                    </div>
                </div>
<div class="well">
                    IP-adress: {{$_SERVER['REMOTE_ADDR']}} 
                    <form role="form" method="POST" action="{{route('CommentReplyStore', 
                                        ['post_id'=>$post_id,
                                        'comment_id'=>$comment->id,
                                    'ip'=>$_SERVER['REMOTE_ADDR']])}}">

                       
                        <label for="Name">Имя:<span style="color: red">*</span></label>
                       <input type="text" class="form-control" id="name" name="replyname">
                        <div class="form-group">
                            <label for="comment">Комментарий:<span style="color: red">*</span> </label>
                            <textarea class="form-control" rows="3" name="replycomment"></textarea>
                            <input type="hidden" class="form-control" name="post_id" value="{{$post_id}}">
                            <input type="hidden" class="form-control" name="comment_id" value="{{$comment->id}}">
                            <input type="hidden" class="form-control" id="ip" name="ip" value="{{$_SERVER['REMOTE_ADDR']}}">

 
           
            {!! captcha_image_html('ContactCaptcha') !!}
  <input type="text" id="CaptchaCode" name="CaptchaCode"><span style="color: red">*</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Прокомментировать</button>


                        {{csrf_field()}}
                    </form>

                </div>


@endsection
