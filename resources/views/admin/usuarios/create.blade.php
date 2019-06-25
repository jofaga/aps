@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Usuario Crew</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminusuarios'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre', 'Nombre del Usuario:')!!}
			{!!Form::text('nombre', null, ['class'=> 'form-control', 'placeholder'=>'Introduce el nombre del Usuario', 'required'])!!}
		</div>
		
		<div class="form-group">
			{!!Form::label('cargo', 'Cargo del Usuario:')!!}
			{!!Form::text('cargo', null, ['class'=> 'form-control', 'placeholder'=>'Introduce el cargo del Usuario', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion', 'Resumen del Usuario:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion', null, ['class'=> 'form-control textarea-content', 'placeholder'=>'Introduce el resumen del Usuario']) !!}
			</div>
		</div>
		
		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$('.textarea-content').trumbowyg();
</script>
@endsection