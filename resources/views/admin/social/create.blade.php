@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Red Social</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'/adminsocial'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre', 'Nombre de la red social:')!!}
			{!!Form::text('nombre', null, ['class'=> 'form-control', 'placeholder'=>'Introduce el nombre de la red social', 'required'])!!}
		</div>
		
		<div class="form-group">
			{!!Form::label('link', 'Enlace a la red social:')!!}
			{!!Form::text('link', null, ['class'=> 'form-control', 'placeholder'=>'Introduce el enlace de la red social', 'required'])!!}
		</div>
		
		<div class="form-group">
			{!!Form::label('icon_path', 'Icono para la red social:')!!}
			{!!Form::text('icon_path', null, ['class'=> ' iconpicker', 'placeholder'=>'Selecciona el icono para la red social', 'required'])!!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$(document).ready(function() {
	$('.iconpicker').fontIconPicker();
  });
</script>
@endsection