@extends('layouts.admin')


@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Proyectos</h1>		
	</div>
	@foreach ($proyectos as $proyecto)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-md-9 col-8">
							<h2>{{ $proyecto['nombre_proyecto'] }}</h2>
						</div>
						<div class="col-md-3 col-4">
							<a href="{{route('adminproyectos.edit', $proyecto->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminproyectos.destroy', $proyecto->id)}}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Borrar</button>
								<a href="{{route('adminfotosproyecto.show', $proyecto->id)}}" class="btn btn-info">Fotos</a>
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
				{!!$proyectos->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="adminproyectos/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop