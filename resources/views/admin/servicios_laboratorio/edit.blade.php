@extends('layouts.admin')
@section ('content')
<div class="container">
	<div class="admin">
		<h1>Editar servicio: {{ $serviciolab->nombre_servicio_lab }}</h1>	
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

	{!!Form::model($serviciolab, ['method' => 'PATCH', 'action' => ['ServicioslaboratorioController@update', $serviciolab->id]])!!}
	 @csrf
		<div class="form-group">
			{!!Form::label('nombre_servicio_lab', 'Nombre del servicio:')!!}
			{!!Form::text('nombre_servicio_lab', null, ['class'=> 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion_servicio_lab', 'Descripción del servicio:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion_servicio_lab', null, ['class'=> 'form-control textarea-content']) !!}
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