@extends('layouts.admin')

@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Fotografías de Laboratorio</h1>	
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
		<div class="row">
			@foreach ($fotos as $foto)					
				<div class="col-md-4">
					<div class="card">					
						<div class="card-body">
								<img height="200px" width="300px"  src="/images/laboratorio/{!! $foto->path_foto !!}" class="img-responsive">
								<form onsubmit="return confirm('¿Estas seguro de eliminiar la fotografía?')" class="d-inline-block" method="post" action="{{route('adminfotoslaboratorio.destroy', $foto->id)}}">
									<br>
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger">Borrar Imagen</button>
								</form>	
						</div>
					</div>
				</div>	
			@endforeach					
		</div>							
</div>
	<div class="container">
		<div class="mt-4">
			<div class="row">
				
				<div class="col-4">
					{!!Form::open(['url'=>'adminfotoslaboratorio', 'method'=>'POST', 'files'=>true])!!}
					 @csrf
						<div class="form-group">
							{!!Form::label('path_foto', 'Fotografía:')!!}
							{!!Form::file('path_foto', ['required', 'id'=>'file', 'size'=>'5120'])!!}
							<p id="data"></p>
						</div>
						<div class="form-group">
							{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control', 'onclick'=>'prueba()', 'id'=>'valida']) !!}
						</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>

@include('admin.filevalidator')

@stop

	

