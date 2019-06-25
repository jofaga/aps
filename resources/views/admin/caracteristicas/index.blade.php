@extends('layouts.admin')

@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Características APS</h1>	
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

@foreach($caracteristicas as $caracteristica)
		<div class="card">
			<div class="card-body">
				<div class="row">
						<div class="col-md-10 col-8">
							<h2>{{ $caracteristica['nombre'] }}</h2>
						</div>
						<div class="col-md-2 col-4">
							<a href="{{route('admincaracteristicas.edit', $caracteristica->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('admincaracteristicas.destroy', $caracteristica->id)}}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</div>
				</div>						
			</div>
		</div>
		<br>
@endforeach
<div class="container">
		<div class="mt-4">
			<div class="row">
				<div class="col-10">
				{!!$caracteristicas->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="admincaracteristicas/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop