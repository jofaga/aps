@extends('layouts.admin')


@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Edificios</h1>		
	</div>
	@foreach ($edificios as $edificio)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-8">
							<h2>{{ $edificio['nombre'] }}</h2>
						</div>
						<div class="col col-4">
							<a href="{{route('adminedificios.edit', $edificio->id)}}" class="btn btn-info">Editar</a>
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminedificios.destroy', $edificio->id)}}">
								@csrf
								@method('delete')
								<button type="submit" class="btn btn-danger">Borrar</button>
								<a href="{{route('admintelefonosedificios.show', $edificio->id)}}" class="btn btn-info">Teléfonos</a>
							</form>
								@if($edificio->contacto)
									<button class="btn btn-warning"><i class="far fa-check-square" data-toggle="tooltip" data-html="true" title="Datos para contacto"></i></button>
								@else
									<a  href="{{ route('admin/edificio/contacto', array($edificio->id)) }}" class="btn btn-primary"><i class="far fa-check-square"></i></a>
								@endif	
						</div>
				</div>						
			</div>
		</div>
	@endforeach	
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-12">
			<div class="card">
				<div class="card-header">
					<h4>Simbología</h4>
				</div>
				<div class="card-body">
					 <p>Indica que los datos del edificio aparecerán en la sección de contacto : <span class="far fa-check-square btn-warning"></span></p> 
						 <p>Indica que los datos del edificio NO aparecerán en la sección de contacto : <span class="far fa-check-square btn-primary"></span></p>  
				</div>
			</div>
		</div>
	</div>
</div>


	<div class="container">
		<div class="mt-4">
			<div class="row">
				<div class="col-10">
					
					
				{!!$edificios->links()!!}
				</div>
				<div class="col-md-2 col-6">
					<a href="adminedificios/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>

			</div>
		</div>
	</div>	
@stop