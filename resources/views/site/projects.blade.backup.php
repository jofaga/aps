@extends('layouts.web')

@section('title')
	APS Servicios
@endsection

@section('title-banner')
	Proyectos
@endsection

@section('seo')


@endsection

@section('content')
@include('layouts.navbar')


<div class="projects">
	<div class="container">
		<div class="row">
			<div class="card-deck">
				@foreach($projects as $project)
						@foreach($fotos as $foto)
							@if($foto->id_proyecto==$project->id && $foto->thumb==true )
								<?php $ruta = $foto->path_foto; ?>
							@endif
						@endforeach

						@foreach($clientes as $cliente)
							@if($project->id_cliente==$cliente->id)
								<?php $customer = $cliente->nombre_cliente; ?>
							@endif
						@endforeach
		
				
	
			  	<div class="card text-white bg-dark mb-3">
			    	<a href="{{ route('/proyecto', $project->id)}}"> <img class="card-img-top" src="{{ 'images/proyectos/'.$ruta }}" alt="{{ $project->nombre_proyecto }}">
					    <div class="card-body">
					      <h5 class="card-title">{!!$project->nombre_proyecto!!}</h5></a>
					     <ul class="list-group card-text">
						  <li class="list-group-item">Cliente: {!!$customer!!} </li>
						  <li class="list-group-item">Ubicación: {!!$project->ubicacion!!}</li>
						  <li class="list-group-item">Fecha de terminación: {!!$project->fecha_terminacion!!}</li>
						  <li class="list-group-item">Capacidad: {!!$project->capacidad!!} LPS </li>
						</ul>
					    </div>
				</div>
				@endforeach
						</div>
		</div>
			<div class="clearfix"></div>
			<br>
			<div class="row justify-content-center">
				{!!$projects->links()!!}
			</div>
				
					<br>	
	</div>
</div>
@endsection