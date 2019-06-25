@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear característica de APS</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif
	
	{!!Form::open(['url'=>'admincaracteristicas', 'method'=>'POST'])!!}
	 @csrf

		<div class="form-group">
			{!!Form::label('nombre', 'Nombre de la característica:')!!}
			{!!Form::text('nombre',null ,['required','class'=>'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('contenido', 'Contenido de la característica:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('contenido', null, ['class'=> 'form-control textarea-content', 'placeholder'=>'Introduce la descripción']) !!}
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