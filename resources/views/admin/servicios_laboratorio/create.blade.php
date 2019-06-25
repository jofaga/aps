@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Servicio de Laboratorio</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminservicioslaboratorio'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_servicio_lab', 'título del servicio del laboratorio:')!!}
			{!!Form::text('nombre_servicio_lab', null, ['class'=> 'form-control', 'placeholder'=>'Introduce el título del servicio'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion_servicio_lab', 'Descripción del servicio:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion_servicio_lab', null, ['class'=> 'form-control textarea-content', 'required','placeholder'=>'Introduce la descripción del servicio']) !!}
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