@extends('admins.layouts.template')

@section('show_content')

{{ csrf_field() }}



    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/admin">Главная страница</a>
            </li>
            <li class="active">  <a href="{{route('sadalaShow', ['id'=>$show->sadala])}}"> {{$show->sadala}}</a>
            </li>
        </ol>

        <!-- Page Heading/Breadcrumbs -->
        <a class="btn btn-warning" href="{{route('articleEdit',['id'=>$show->id])}}">Редактировать</a>
       
        <a class="btn btn-danger" href="{{route('articleDelete',['id'=>$show->id])}}">Удалить</a>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><h1>{{$show->title}} <span style="color: red">({{count($comments)}})</span></h1>
                    <small>by <a href="#">{{$show->author}}</a>
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
                <p><i class="fa fa-clock-o"></i> Опубликовано {{$show->created_at}}</p>
                <p>Автор: {{$show->author}}</p>

                <hr>

                <!-- Preview Image -->
               <p style="text-align:center;">
                                <img src="/{{$show->articlepic}}">
                                </p>

                <hr>

                <!-- Post Content -->
                <p>{{$show->body}}</p>
                <a class="btn btn-lg btn-default btn-block" href="{{route('sadalaShow', ['id'=>$show->sadala])}}">Все статьи этого раздела</a>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    IP-adress: {{$_SERVER['REMOTE_ADDR']}}
                    <form role="form" method="POST" action="{{route('CommentStore', ['id'=>$show->id, 'ip'=>$_SERVER['REMOTE_ADDR']])}}">
                        <label for="Name">Имя:<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="form-group">
                            <label for="comment">Комментарий:<span style="color: red">*</span> </label>
                            <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
                            <input type="hidden" class="form-control" id="sadala" name="post_id" value="{{$show->id}}">
                            <input type="hidden" class="form-control" id="ip" name="ip" value="{{$_SERVER['REMOTE_ADDR']}}">


                        </div>
                        <button type="submit" class="btn btn-primary">Прокомментировать</button>


                        {{csrf_field()}}
                    </form>

                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @if (count($comments)==0)
                    <h1>Нет комментариев</h1>
                @else
                    @foreach($comments as $comment)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->name}}
                                    <small>{{$comment->created_at}}</small>
                                    <small>IP: {{$comment->ip}}</small>
                                </h4>
                                @if (empty($comment->deleted_at))
                                {{$comment->comment}}
                                <a class="btn btn-danger" href="{{route('CommentDelete',['commentid'=>$comment->id, 'postid'=>$show->id])}}">Удалить</a>
                                @else
                                <h4>{{$comment->comment}} <span style="color: red">Комментарий был удалён {{$comment->deleted_at}}</span></h4>
                                @endif
                            </div>
                            
                        </div>
                @endforeach
            @endif


            <!-- Comment -->
                <!--     <div class="media">
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
                            <!-- Nested Comment -->
                <!--  <div class="media">
                      <a class="pull-left" href="#">
                          <img class="media-object" src="http://placehold.it/64x64" alt="">
                      </a>
                      <div class="media-body">
                          <h4 class="media-heading">Nested Start Bootstrap
                              <small>August 25, 2014 at 9:30 PM</small>
                          </h4>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                          sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                          turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                          in faucibus.
                      </div>
                  </div>-->
                <!-- End Nested Comment -->
            </div>
        </div>

    </div>

    <!-- Blog Sidebar Widgets Column -->
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </body>

    </html>

    <script>
        $('.carousel').carousel({
            interval: 2000 //changes the speed
        })
    </script>
@endsection