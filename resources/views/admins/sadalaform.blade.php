@extends('admins.layouts.template')

@section('sadalaform')

    
    
    <form method="POST" action="{{route('SadalaStore')}}" enctype="multipart/form-data">

    <div class="form-group">
    <label for='title'>Название раздела</label>
    <input type="text" class='form-control' name='title' id='title' placeholder="Название раздела">
    </div>
    
    
   
    <input type='submit' class='btn btn-primary' value="OK">
{{ csrf_field() }}
</form>
    

    @endsection