@extends('layouts.admin')

@section ('content')
<div class="container">	
	<div class="admin">
		<h1>Telefonos de {{ $item->nombre}}</h1>	
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
			@foreach ($telefonos as $telefono)					
				<div class="col-md-3">
					<div class="card">	
					<div class="card-header">
							Telefonos {{ $item->nombre}}			
					</div>				
						<div class="card-body">
								<h3>{{ $telefono->telefono}} </h3>
								<form onsubmit="return confirm('¿Estas seguro de eliminiar el teléfono?')" class="d-inline-block" method="post" action="{{route('admintelefonos.destroy', $telefono->id)}}">
									<br>
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger">Borrar teléfono</button>
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
					{!!Form::open(['url'=>'admintelefonos', 'method'=>'POST', 'name'=>'miformulario' ])!!}
					 @csrf
						<div class="card">
							<div class="card-header">
								<strong>Dar de alta nuevo teléfono</strong> 
							</div>

							<div class="card-body">
								<div class="form-group">
									{!!Form::label('telefono', 'Teléfono:')!!}
									{!!Form::tel('telefono',null ,['required','id'=>'idcodigo'])!!}
								</div>
									<input type="hidden" id="id_entus" name="id_entus" value="{!!$item->id !!}">
								<div class="form-group">
									{!! Form::submit('Agregar', ['class' => 'btn btn-primary form-control']) !!}
								</div>
							</div>
						</div>
					{!!Form::close()!!}

				</div>
			</div>
		</div>
	</div>

@include('admin.validanumeros')
@stop

	

