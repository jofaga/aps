@extends('layouts.admin')


@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Redes Sociales</h1>		
	</div>
	@foreach ($redes as $red)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-md-10 col-8">
							<h2>{{ $red['nombre'] }}</h2>
						</div>
						<div class="col-md-2 col-4">
							<a href="{{route('adminsocial.edit', $red->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminsocial.destroy', $red->id)}}">
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
				{!!$redes->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="adminsocial/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop