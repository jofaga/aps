@extends('layouts.admin')
@section ('content')
<div class="container">
  <div class="admin">
    <h1>Crear Correo</h1>  
  </div>
  
  @if($errors->all())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </div>
  @endif


  {!!Form::open(['url'=>'admincorreos', 'method'=>'POST'])!!}
   @csrf
    <div class="form-group">
      {!!Form::label('correo', 'correo electrónico:')!!}
      {!!Form::text('correo', null, ['class'=> 'form-control'])!!}
    </div>

    <div class="form-group">
      {!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
    </div>
  {!!Form::close()!!}
</div>
@stop