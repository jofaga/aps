@extends('layouts.admin')
@section ('content')

<div class="container">
	<div class="admin">
		<h1>Editar cliente: {{ $cliente->nombre_cliente }}</h1>	
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

	{!! Form::model($cliente, ['method' => 'PATCH', 'files'=>true, 'action' => ['ClientesController@update', $cliente->id]])!!}
	@csrf
				
		<div class="form-group">
			{!!Form::label('logo', 'Logo:')!!}
			<p id="data"></p>
			{!!Form::file('logo', ['required', 'id'=>'file', 'size'=>'5120'])!!}
		</div>

		<div class="admin form-group">
			<h1>Logo del cliente</h1>	
			<img height="300px" width="300px" src="{{ asset('/images/logos_clientes/'.$cliente->logo)}}" class="img-responsive">	
		</div>		

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control', 'onclick'=>'prueba()', 'id'=>'valida']) !!}
		</div>
	{!! Form::close()!!}
		
		

</div>
@include('admin.filevalidator')
@stop