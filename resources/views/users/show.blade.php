@extends('users.layouts.template')

@section('show_content')




    <div class="container">

        <ol class="breadcrumb">
            <li><a href="/">Главная страница</a>
            </li>
            
            <li class="active">  <a href="{{route('sadalaShow', ['id'=>$posts->sadala_id])}}"> {{$posts->sadalas['sadala_name']}}</a>
            </li>
        </ol>
      


        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header"><h1>{{$posts->title}} <span style="color: red">({{count($posts->answers)+count($posts->comments)}})</span></h1>
                    <small>by <a href="#">{{$posts->author}}</a>
                    </small>
                </h1>

            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <hr>

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Опубликовано {{$posts->created_at}}</p>
                <p>Раздел: {{$posts->sadalas['sadala_name']}}</p>
                <p>Автор: {{$posts->author}}</p>

                <!-- Preview Image -->
                <p style="text-align:center;">
                                <img src="/{{$posts->articlepic}}" style="text-align: center">
                                </p>

                <!-- Post Content -->
                <p>{{$posts->body}}</p>
                <a class="btn btn-lg btn-default btn-block" href="{{route('sadalaShow', ['id'=>$posts->sadala_id])}}">Все статьи этого раздела</a>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                 @if (count($posts->comments)==0)
                <h2>К статье еще нет комментариев!</h2>
                @endif
                <div class="well">
                    IP-adress: {{$_SERVER['REMOTE_ADDR']}}
                    <form role="form" method="POST" action="{{route('CommentStore', ['id'=>$posts->id, 'ip'=>$_SERVER['REMOTE_ADDR']])}}">
                        <label for="Name">Имя:<span style="color: red">*</span></label>
                       <input type="text" class="form-control" id="name" name="name">
                        <div class="form-group">
                            <label for="comment">Комментарий:<span style="color: red">*</span> </label>
                            <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
                            <input type="hidden" class="form-control" id="sadala" name="post_id" value="{{$posts->id}}">
                            <input type="hidden" class="form-control" id="ip" name="ip" value="{{$_SERVER['REMOTE_ADDR']}}">


                        </div>
                        <button type="submit" class="btn btn-primary">Прокомментировать</button>


                        {{csrf_field()}}
                    </form>

                </div>

                <hr>
 
                <!-- Posted Comments -->

                <!-- Comment -->
                
                
                @foreach ($posts->comments as $comment)

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        
                        <h4 class="media-heading">{{$comment->name}}
                                                       
                            <small>{{$comment->created_at}}</small>
                            <small>IP: {{$comment->ip}}</small>
                        </h4>
                        @if (!empty($comment->deleted_at)) 
                        
                        <b>Комментарий удалён! {{$comment->deleted_at}}</b>
                        
                        @else
                        <h4>{{$comment->comment}}</h4>
                        <form role="form" method="POST" action="{{route('ReplyToComment', 
                                    ['comment_id'=>$comment->post_id, 
                                  'post_id'=>$comment->id])}}">
                           <input type="submit" name="submit" value="Ответить">
                           {{csrf_field()}}
                        </form>
                        
                        @if (count($comment->answers)>0)
                        
                        @foreach ($comment->answers as $answer)
                        <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading">{{$answer->answer_author}}
                                <small>{{$answer->created_at}} IP:</small>
                            </h4>
                            {{$answer->answer_text}}
                        
                         <!--End Nested Comment--> 
                    </div>
                </div>
                        @endforeach
                        @endif
                       
                                               
                   
                    </div>
                </div>
               
                @endif
                 @endforeach   


                 <!--Comment--> 
<!--                     <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                            nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                             Nested Comment 
                        
                         End Nested Comment 
                    </div>
                </div>-->

            </div>

            <!-- Blog Sidebar Widgets Column 
            <div class="col-md-4">

                <!-- Blog Search Well -->


                <!-- Blog Categories Well -->
                <!--              <div class="well">
                                      <h4>Blog Categories</h4>
                                      <div class="row">
                                              <div class="col-lg-6">
                                                      <ul class="list-unstyled">
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                      </ul>
                                              </div>
                                              <div class="col-lg-6">
                                                      <ul class="list-unstyled">
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                              <li><a href="#">Category Name</a>
                                                              </li>
                                                      </ul>
                                              </div>
                                      </div>
                                      <!-- /.row -->
            </div>


            <!-- Side Widget Well -->


        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
   

    </body>

    </html>

    <script>
        $('.carousel').carousel({
            interval: 2000 //changes the speed
        })
    </script>
@endsection
