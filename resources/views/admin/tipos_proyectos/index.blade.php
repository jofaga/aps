@extends('layouts.admin')


@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Tipos de proyecto</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif




	@foreach ($tipos as $tipo)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-md-10 col-8">
							<h2>{{ $tipo['tipo_proyecto'] }}</h2>
						</div>
						<div class="col-md-2 col-4">
							<a href="{{route('admintipoproyectos.edit', $tipo->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('admintipoproyectos.destroy', $tipo->id)}}">
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
				{!!$tipos->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="admintipoproyectos/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop