@extends('layouts.admin')


@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Productos</h1>		
	</div>
	@foreach ($productos as $producto)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-9">
							<h2>{{ $producto['nombre_producto'] }}</h2>
						</div>
						<div class="col col-3">
							<a href="{{route('adminproductos.edit', $producto->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminproductos.destroy', $producto->id)}}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Borrar</button>
								<a href="{{route('admin/fotos/productos', $producto->id)}}" class="btn btn-info">Fotos</a>
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
				{!!$productos->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="adminproductos/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop