@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar información de la Página</h1>	
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

	{!!Form::model($info_pagina, ['method' => 'PATCH', 'action' => ['PaginaController@update', $info_pagina->id]])!!}
	 @csrf

	 <h2 class="admin">Página Home</h2>
<div class="container">
	<div class="row">
		<div class="col-md-6 form-group">
			<div class="col-12">				
			{!!Form::label('slogan', 'Slogan de página de incio:')!!}
			{!!Form::text('slogan', null, ['class'=> 'form-control', 'required', 'maxlength="100"', 'autofocus'])!!}
			</div>
		</div>
		<div class="col-md-6 form-group">
			{!!Form::label('textolaboratorio', 'Texto en la sección de Laboratorio:')!!}
			<div class="trumbowyg-background">
			{!!Form::textarea('textolaboratorio', null, ['class'=> 'form-control textarea-content', 'required', 'maxlength="1000"', 'autofocus'])!!}
		</div>
		</div>
	</div>
</div>

	{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control']) !!}
	{!!Form::close()!!}
</div>



@stop

	 @section('js')
<script>
	$('.textarea-content').trumbowyg();
	</script>

@endsection
