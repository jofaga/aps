@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Sub-tipo de producto</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminsubtipoproductos'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('subtipo', 'Sub-tipo de proyecto:')!!}
			{!!Form::text('subtipo', null, ['class'=> 'form-control', 'required'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!!Form::close()!!}
</div>
@stop