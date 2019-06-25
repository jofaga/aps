@extends('layouts.admin')

@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Correos de: {{ $usuario->nombre}}</h1>	
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
			@foreach ($correos as $correo)					
				<div class="col-md-4">
					
					<div class="card">
  						<div class="card-header">
    						Correo APS
  						</div>
  							 <div class="card-body">
					
								<p>{!! $correo->correo !!}</p>
								<form onsubmit="return confirm('¿Estas seguro de eliminiar el correo?')" class="d-inline-block" method="post" action="{{route('admincorreos.destroy', $correo->id)}}">
									<br>
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger">Borrar Correo</button>
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
				<div class="col-6">
					{!!Form::open(['url'=>'admincorreos', 'method'=>'POST'])!!}
					 @csrf
						<div class="form-group">
							{!!Form::label('correo', 'Correo:')!!}
							{!!Form::text('correo',null ,['class'=>'form-control','required', 'placeholder'=>'Introduce el correo'])!!}
							<p id="data"></p>
						</div>
							<input type="hidden" id="id_entus" name="id_entus" value="{!!$usuario->id !!}">
						<div class="form-group">
							{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
						</div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>


@stop

	

