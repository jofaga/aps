@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar usuario: {{ $usuario->nombre }}</h1>	
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

	{!!Form::model($usuario, ['method' => 'PATCH', 'action' => ['UsuariosController@update', $usuario->id]])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre', 'Nombre del usuario:')!!}
			{!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion', 'Descripción del usuario:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion', null, ['class'=> 'form-control textarea-content']) !!}
			</div>
		</div>
		<div class="form-group">
			{!!Form::label('cargo', 'Cargo del usuario:')!!}
			{!!Form::text('cargo', null, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$('.textarea-content').trumbowyg();
</script>
@endsection