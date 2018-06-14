@extends('users.layouts.template')

@section('fresh_news')

    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">
                    Свежие новости
                </h1>
                <h2 class="page-header" align="center">

                </h2>
    
            @foreach($posts as $post)
            
                    <a href="{{route('articleShow', ['id'=>$post->id])}}">
                <div class="col-md-4 col-sm-3 col-lg-3">





                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                            <h4 align="center"><i class="fa fa-fw fa-check"></i> {{$post->title}}  <span style="color:red" <p>({{count($post->answers)+count($post->comments)}})</p></span></h4>
                             <h4>Автор статьи: {{$post->author}}</h4>
                           
                                                  
                            
                             <p>Раздел: {{$post->sadalas['sadala_name']}} </p>
                            
                            <p>Опубликовано: {{$post->created_at}}</p>
                        </div>
                        <div class="panel-body">
                            <p style="text-align:center;">
                                <img src="/{{$post->trumbnail}}" style="text-align: center">
                                </p>
                            <p>{{$post->anotation}}</p>

                        </div>
                    </div>


                    </div>
                    </a>
                
                
                 @endforeach
        </div>



            </div>
        </a>

        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">История Брянских лесов</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="{{asset('images/700x450/1.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="{{asset('images/700x450/2.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="{{asset('images/700x450/5.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="{{asset('images/700x450/6.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="{{asset('images/700x450/7.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">

                <a href="">
                    <img class="img-responsive img-portfolio img-hover" src="{{asset('images/700x450/8.jpg')}}" alt="">
                </a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Коротко о Вини-Пухе</h2>
            </div>
            <div class="col-md-6">
                <p>Вини-Пух и все все все</p>
                <ul>
                    <li><strong>В Ролях:</strong>
                    </li>
                    <li>Вини-Пух</li>
                    <li>Пятачок</li>
                    <li>Ослик Йа</li>
                    <li>Кролик</li>
                    <li>Сова</li>
                </ul>
                <p>...и другие</p>
            </div>
            <div class="col-md-6">

                <img class="img-responsive" src="{{asset('images/700x450/9.jpg')}}" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Приезжайте к нам в Брянские Леса</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Зарезервировать билеты</a>
                </div>
            </div>
        </div>

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


    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 2000 //changes the speed
        })
    </script>

    </body>

    </html>





@endsection


