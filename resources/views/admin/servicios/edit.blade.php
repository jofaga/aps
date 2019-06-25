@extends('layouts.admin')
@section ('content')

<div class="container">
	<div class="admin">
		<h1>Editar Servicio: {{ $servicio->nombre_servicio }}</h1>	
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

	{!! Form::model($servicio, ['method' => 'PATCH', 'files'=>true, 'action' => ['ServiciosController@update', $servicio->id]])!!}
	@csrf
				
		<div class="form-group">
			{!! Form::label('descripcion_servicio', 'Descripción del servicio:') !!}
			<div class="trumbowyg-background">
				{!! Form::textarea('descripcion_servicio', null, ['class'=> 'form-control textarea-content']) !!}
		</div>

		<div class="form-group">
			{!!Form::label('foto', 'foto:')!!}
			<p id="data"></p>
			{!!Form::file('foto', [ 'id'=>'file', 'size'=>'5120'])!!}
		</div>

		<div class="admin form-group">
			<h1>Foto del servicio</h1>	
			<img height="300px" width="300px" src="/images/servicios/{{ $servicio->foto}}" class="img-responsive">	
		</div>		

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary form-control', 'onclick'=>'prueba()', 'id'=>'valida']) !!}
		</div>
	{!! Form::close()!!}
		
		

</div>
@include('admin.filevalidator')
@stop
@section('js')
<script>
	$('.textarea-content').trumbowyg();
</script>
@endsection