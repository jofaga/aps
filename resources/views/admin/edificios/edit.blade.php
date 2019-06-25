@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar Edificio: {{ $edificio->nombre}}</h1>	
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

	{!!Form::model($edificio,['method'=>'PATCH', 'action'=>['EdificiosController@update', $edificio->id]])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre', 'Nombre del Edificio:')!!}
			{!!Form::text('nombre', null, ['class'=> 'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('calle', 'Calle del Edificio:')!!}
			{!!Form::text('calle', null, ['class'=> 'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('colonia', 'Colonia del Edificio:')!!}
			{!!Form::text('colonia', null, ['class'=> 'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('cp', 'Código Postal:')!!}
			{!!Form::text('cp', null, ['class'=> 'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('ciudad', 'Introduce la ciudad:')!!}
			{!!Form::text('ciudad', null, ['class'=> 'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('estado', 'Estado:')!!}
			{!!Form::select('estado',$estado, $estadocargado, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('pais', 'Pais:')!!}
			{!!Form::select('pais',$pais, $paiscargado,['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('horario', 'Horario:')!!}
			{!!Form::text('horario', null, ['class' => 'form-control', 'required'])!!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$('.chosen-select').chosen({
		placeholder_text_multiple: 'Seleccionar'
	});
	$('.textarea-content').trumbowyg();
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		language: "es",
		autoclose: true
	});

</script>
@endsection