@extends('admins.layouts.template')

@section('show_content')



   <form method="POST" action="{{route('articleUpdate')}}" enctype="multipart/form-data">

    <div class="form-group">
    <label for='title'>Title</label>
    <input type="text" class='form-control' value='{{$posts->title}}' name='title' id='title' placeholder="Title">
    </div>
    
    <div class="form-group">
        <label for='anotation'>Anotation</label>
        <input type="text" class='form-control' value='{{$posts->anotation}}' name='anotation' id='anotation' placeholder="anotation">
    </div>
    
    <div class="form-group">
        <label for='author'>Author</label>
        <input type="text" class='form-control' value='{{$posts->title}}'  name='author' id='author' placeholder="author">
    </div>
    
    <div class='form-group'>
        <label for='sadala'>Sadala</label>
         <select class="form-control" name="sadala">
            @foreach($sadalas as $sadala)
                <option value="{{$sadala->sadala_name}}">{{$sadala->sadala_name}}</option>
            @endforeach
        </select>
    </div>
    
    <div class='form-group'>
        <label for='body'>Text</label>
        <textarea class='form-control' id='body' value='{{$posts->body}}' name='body' placeholder="body">{{$posts->body}}</textarea>
    </div>
         <div class='form-group'>
    <input type="file" name="file">
    </div>
         
       <input type='hidden' name='id' value='{{$posts->id}}'>
    <input type='submit' class='btn btn-primary' value="OK">
{{ csrf_field() }}
</form>
    
    @endsection
