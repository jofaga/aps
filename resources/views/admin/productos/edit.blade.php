@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar producto: {{ $producto->nombre_producto }}</h1>	
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

	{!!Form::model($producto, ['method' => 'PATCH', 'action' => ['ProductosController@update', $producto->id]])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_producto', 'Nombre del producto:')!!}
			{!!Form::text('nombre_producto', null, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion_producto', 'Descripción del producto:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion_producto', null, ['class'=> 'form-control textarea-content']) !!}
			</div>
		</div>
		
		<div class="form-group">
			{!!Form::label('id_tipo', 'Tipo de producto:')!!}
			{!!Form::select('id_tipo',$tipos, $tiposcargados, ['class'=>'form-control chosen-select'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$('.chosen-select').chosen();
	$('.textarea-content').trumbowyg();

</script>
@endsection