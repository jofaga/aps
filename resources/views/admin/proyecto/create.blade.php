@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Proyecto</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminproyectos', 'name'=>'proyectos'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_proyecto', 'Nombre del proyecto:')!!}
			{!!Form::text('nombre_proyecto', null, ['required','class'=> 'form-control', 'placeholder'=>'Introduce el nombre del proyecto'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion', 'Descripción del proyecto:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion', null, ['required','class'=> 'form-control textarea-content', 'placeholder'=>'Introduce la descripción del proyecto']) !!}
			</div>
		</div>
		<div class="form-group">
			{!!Form::label('fecha_terminacion', 'Fecha de terminación:')!!}
			{!!Form::text('fecha_terminacion', null, ['required','class'=> 'form-control datepicker', 'placeholder'=>'Selecciona la fecha de terminación'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('ubicacion', 'Ubicación del proyecto:')!!}
			{!!Form::text('ubicacion', null, ['required','class'=> 'form-control', 'placeholder'=>'Introduce la ubicación del proyecto'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('tipo', 'Tipo de proyecto:')!!}
			{!!Form::select('tipo[]',$tipo, null, ['required','class'=>'form-control chosen-select', 'multiple'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('cliente', 'Cliente:')!!}
			{!!Form::select('id_cliente',$cliente, null, ['required','class'=>'form-control', 'placeholder'=>'Selecciona el cliente'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('capacidad', 'Capacidad del proyecto (Litros):')!!}
			{!!Form::text('capacidad', null, ['required','id'=>'idcodigo','class'=> 'form-control', 'placeholder'=>'Introduce la capacidad del proyecto' ])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop
@section('js')
<script>
	$('.chosen-select').chosen({
		placeholder_text_multiple: 'Selecciona los tipos de proyectos'
	});
	$('.textarea-content').trumbowyg();
	$('.datepicker').datepicker({
		format: "yyyy-mm-dd",
		language: "es",
		autoclose: true
	});

window.addEventListener("load", function() {
proyectos.capacidad.addEventListener("keypress", soloNumeros, false);
});

//Solo permite introducir numeros.
function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}

</script>
@endsection