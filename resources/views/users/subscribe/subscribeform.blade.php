@extends('users.layouts.template')

@section('show_content')


<form method="POST" action="{{route('SubmitInfoStore')}}" enctype="multipart/form-data">

    <div class="form-group">
    <label for='subscriber'>Имя:</label>
    <input type="text" class='form-control' name='subscriber' id='subscriber' placeholder="Имя">
    </div>
    
    <div class="form-group">
        <label for='email'>Anotation</label>
        <input type="email" class='form-control' name='email' id='email' placeholder="Адрес электронной почты">
    </div>
    
    <input type='submit' class='btn btn-primary' value="Подписаться на последние известия!">
{{ csrf_field() }}
</form>
    
     

    @endsection
