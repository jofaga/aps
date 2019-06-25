@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear tipo de producto</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'admintipoproductos', 'method'=>'POST', 'files'=>true])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('tipo_producto', 'Tipo de proyecto:')!!}
			{!!Form::text('tipo_producto', null, ['class'=> 'form-control', 'required'])!!}
		</div>
		<div class="col-4">
			<div class="form-group">
				{!!Form::label('path_foto', 'Fotografía:')!!}
				{!!Form::file('path_foto', ['required', 'id'=>'file', 'size'=>'5120'])!!}
				<p id="data"></p>
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!!Form::close()!!}
</div>
@include('admin.filevalidator')
@stop