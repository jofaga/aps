@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar característica: {{ $caracteristica->nombre }}</h1>	
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

	{!!Form::model($caracteristica, ['method' => 'PATCH', 'action' => ['CaracteristicasController@update', $caracteristica->id]])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre', 'Nombre de la característica:')!!}
			{!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('contenido', 'Contenido de la característica:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('contenido', null, ['class'=> 'form-control textarea-content']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!!Form::close()!!}
</div>

@stop

@section('js')
<script>
	$('.textarea-content').trumbowyg();
</script>
@endsection