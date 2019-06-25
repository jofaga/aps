@extends('layouts.admin')

@section ('content')

<div class="container">
	<div class="admin">
		<h1>Administración de equipo de APS</h1>	
	</div>
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif

		@foreach ($usuarios as $usuario)	
			<div class="card mt-4">
				<div class="card-body">
					<div class="row">
							<div class="col-6">
								<h2>{{ $usuario['nombre'] }}</h2>
							</div>
							<div class="col-md 6 col-6">
								<a href="{{route('adminusuarios.edit', $usuario->id)}}" class="btn btn-info">Editar</a>
								<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminusuarios.destroy', $usuario->id)}}">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger">Borrar</button>
									<a href="{{route('admin/fotos/usuarios', $usuario->id)}}" class="btn btn-dark">Fotos</a>
									<a href="{{route('admin/correos/usuarios', $usuario->id)}}" class="btn btn-warning">Correos</a>
									<a href="{{route('admin/telefonos/usuarios', $usuario->id)}}" class="btn btn-secondary">Teléfonos</a>
								</form>
							</div>
					</div>						
				</div>
			</div>
		@endforeach	
	</div>
</div>
	<div class="container">
		<div class="mt-4">
			<div class="row">
				<div class="col-10">
				{!!$usuarios->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="adminusuarios/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	

@stop