@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear tipo de proyecto</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'admintipoproyectos'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('tipo_proyecto', 'Tipo de proyecto:')!!}
			{!!Form::text('tipo_proyecto', null, ['class'=> 'form-control', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('tag', 'Tag para barra de navegación (nombre corto):')!!}
			{!!Form::text('tag', null, ['class'=> 'form-control', 'required'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!!Form::close()!!}
</div>
@stop