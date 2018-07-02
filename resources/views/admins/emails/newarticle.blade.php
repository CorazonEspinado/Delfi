
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/offcanvas.css')}}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/modern.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/offcanvas.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="corazon.lv">{{config('app.name')}}</a>
            
        </div>
        
    </div>
    </nav>
        
    <div class="container">
        <ol class="breadcrumb">
            <!--<li><a href="/">Главная страница</a>-->
            </li>
        </ol>
      
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            
            <div class="col-lg-12">
                <h1 class="page-header"><h1>{{$title}}</h1>
                    <small>by {{$author}}</a>
                    </small>
                </h1>

            </div>
        </div>
       
        <div class="row">
            <div class="col-lg-8">
                <hr>
                <p><i class="fa fa-clock-o"></i> Опубликовано: </p>
                <p>Раздел: {{$sadalaname}} </p>
                <p>Автор: {{$author}}</p>

                <p style="text-align:center;">
                                
                                </p>

                <p>{{$body}}</p>
                
                <hr>
                <hr>
              </div>
                </div>
                </div>

                        </div>

        </div>
   
</nav>
    
</body>