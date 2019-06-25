@extends('layouts.admin')
@section ('content')

<div class="container">
	<div class="admin">
		<h1>Editar el Correo: {{ $correo->correo }}</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif

	@if(session()->has('message'))
		<div class="alert alert-success">
			{{session()->get('message')}}
		</div>
	@endif

	{!! Form::model($correo, ['method' => 'PATCH', 'action' => ['CorreosController@update', $correo->id]])!!}
	@csrf
		<div class="form-group">
			{!! Form::label('correo', 'correo: ')!!}
			{!! Form::text('correo', null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close()!!}
</div>

@stop