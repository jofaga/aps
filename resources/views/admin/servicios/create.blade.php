@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Servicio</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminservicios', 'method'=>'POST', 'files'=>true])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_servicio', 'Nombre del servicio:')!!}
			{!!Form::text('nombre_servicio', null, ['class'=> 'form-control', 'placeholder'=>'Introduce el título del servicio'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion_servicio', 'Descripción del servicio:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion_servicio', null, ['class'=> 'form-control textarea-content', 'placeholder'=>'Introduce la descripción del servicio']) !!}
			</div>
		</div>

		<div class="col-4">
					
						<div class="form-group">
							{!!Form::label('foto', 'Fotografía:')!!}
							{!!Form::file('foto', ['required', 'id'=>'file', 'size'=>'5120'])!!}
							<p id="data"></p>
						</div>
		</div>
		
		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control', 'onclick'=>'prueba()', 'id'=>'valida']) !!}
		</div>

	{!!Form::close()!!}
</div>

@include('admin.filevalidator')
@stop


@section('js')
<script>
	$('.textarea-content').trumbowyg();
</script>
@endsection