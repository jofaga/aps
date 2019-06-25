@extends('layouts.admin')
@section ('content')

<div class="container">
	<div class="admin">
		<h1>Editar tipo de proyecto: {{ $tipo->tipo_proyecto }}</h1>	
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

	{!! Form::model($tipo, ['method' => 'PATCH', 'action' => ['Tipo_proyectosController@update', $tipo->id]])!!}
	@csrf
		<div class="form-group">
			{!! Form::label('_proyecto', 'Tipo: ')!!}
			{!! Form::text('tipo_proyecto', null, ['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('tag', 'Tag: ')!!}
			{!! Form::text('tag', null, ['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close()!!}
</div>

@stop

