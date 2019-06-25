@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Cliente</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminclientes', 'method'=>'POST', 'files'=>true])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_cliente', 'Nombre del cliente:')!!}
			{!!Form::text('nombre_cliente', null, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('logo', 'Logo:')!!}
			<p id="data"></p>
			{!!Form::file('logo', ['required', 'id'=>'file', 'size'=>'5120'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control', 'onclick'=>'prueba()', 'id'=>'valida']) !!}
		</div>
	{!!Form::close()!!}
</div>
@include('admin.filevalidator')
@stop