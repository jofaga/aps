@extends('layouts.admin')
@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Subtipos de productos</h1>	
	</div>
	
	@if($errors->all())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
	@endif


	@foreach ($subtipos_productos as $tipo)	
		<div class="card mt-4">
			<div class="card-body">
				<div class="row">
						<div class="col-10">
							<h2>{{ $tipo['subtipo'] }}</h2>
						</div>
						<div class="col col-2">
							{{-- <a href="{{route('admintipoproductos.edit', $tipo->id)}}" class="btn btn-info">Editar</a> --}}
							<form onsubmit="return confirm('¿Estas seguro de eliminiar el registro?')" class="d-inline-block" method="post" action="{{route('adminsubtipoproductos.destroy', $tipo->id)}}">
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
				{!!$subtipos_productos->links()!!}
				</div>
				<div class="col-2">
					<a href="adminsubtipoproductos/create" class="btn btn-success btn-block" role="button">Crear</a>
				</div>
			</div>
		</div>
	</div>	
@stop