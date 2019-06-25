@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Crear Producto</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	{!!Form::open(['url'=>'adminproductos'])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_producto', 'Nombre del producto:')!!}
			{!!Form::text('nombre_producto', null, ['class'=> 'form-control', 'required'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('descripcion_producto', 'Descripción del producto:')!!}
			<div class="trumbowyg-background">
				{!!Form::textarea('descripcion_producto', null, ['class'=> 'form-control textarea-content', 'required'])!!}	
			</div>
		</div>

		<div class="form-group">
			{!!Form::label('id_tipo', 'Tipo de productos:')!!}
			{!!Form::select('id_tipo',$tipos, null, ['class'=>'form-control chosen-select'])!!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control', 'onclick'=>'prueba()', 'id'=>'valida']) !!}
		</div>
	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$('.textarea-content').trumbowyg();
	$('.chosen-select').chosen({
		placeholder_text: 'Selecciona una opción'
	});
</script>
@endsection

