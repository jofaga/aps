@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar red social: {{ $social->nombre }}</h1>	
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

	{!!Form::model($social, ['method' => 'PATCH', 'action' => ['SocialController@update', $social->id]])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre', 'Nombre de la red social:')!!}
			{!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('link', 'Enlace a la red social:')!!}
			{!!Form::text('link', null, ['class'=> 'form-control'])!!}
		</div>
		
		<div class="form-group">
			{!!Form::label('icon_path', 'Icono para la red social:')!!}
			{!!Form::text('icon_path', null, ['class'=> 'form-control iconpicker'])!!}
		</div>


		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
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