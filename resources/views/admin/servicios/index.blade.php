@extends('layouts.admin')


@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Servicios</h1>		
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
	@foreach ($servicios as $servicio)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-md-10 col-8">
							<h2>{{ $servicio['nombre_servicio'] }}</h2>
						</div>
						<div class="col-md-2 col-4">
							<a href="{{route('adminservicios.edit', $servicio->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminservicios.destroy', $servicio->id)}}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</div>
				</div>						
			</div>
		</div>
	@endforeach	
</div>
	<div class="container">
		<div class="mt-4">
			<div class="row">
				<div class="col-10">
				{!!$servicios->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="adminservicios/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop